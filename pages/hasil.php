<?php 
    $nos = 1;
    $jumlah = 0;
    $sum = 0;
    $sqls = mysqli_query($db, "SELECT * FROM kriteria");
    while($b = mysqli_fetch_array($sqls)) {
        $sum = $sum + $b['bobot'];
    }
    $hasil = array();
    $sql = mysqli_query($db, "SELECT * FROM alternatif");
    while($a = mysqli_fetch_array($sql)) { ?>
        <?php
            $S = 0;
            $vector = array();
            $no = 1;
            $kriteria = mysqli_query($db, "SELECT * FROM kriteria");
            while($b = mysqli_fetch_array($kriteria)) {
                $take = mysqli_query($db, "SELECT * FROM data WHERE alternatif_id='".$a['id']."' AND kriteria_id='".$b['id']."'");
                $data = mysqli_fetch_assoc($take);
                if($b['atribut'] == 0) {
                    $vector[] = pow($data['number'], ($b['bobot'] / $sum));
                } else {
                    $vector[] = pow($data['number'], -($b['bobot'] / $sum));
                }
            } 
            foreach($vector as $a => $value) {
                if($a == 0) {
                    $S = $value;
                } else {
                    $S = $S * $value;
                }
            }
            $hasil[] = $S;
            //echo round($S,4); 
            $jumlah = $jumlah + $S;
        ?>
    <?php } ?>

    <?php 
    $value = 0;
    $urutan = array();
    $sort = array();
    $sql = mysqli_query($db, "SELECT * FROM alternatif");
    while($a = mysqli_fetch_array($sql)) { 
        $urutan[] = $hasil[$value] / $jumlah;
        $sort[] = $hasil[$value] / $jumlah;
        $value = $value + 1;
    }
    rsort($sort);  
    ?>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>Alternatif</th>
            <th>Vector V</th>
            <th>Ranking</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $no = 1;
            $value = 0;
            $ranking = 1;
            $sql = mysqli_query($db, "SELECT * FROM alternatif");
            while($a = mysqli_fetch_array($sql)) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $a['nama'] ?></td>
                    <td><?= $urutan[$value]; ?></td>
                    <td>
                        <?php   
                            $rank_list = 1;
                            foreach($sort as $a => $values) {
                                if($values != $urutan[$value]) {
                                    $rank_list = $rank_list + 1;
                                } else {
                                    echo $rank_list;
                                }
                            }
                            //echo $sort[$value];
                            $value = $value + 1;
                        ?>
                    </td>
                </tr>
            <?php } ?>
    </tbody>

</table>