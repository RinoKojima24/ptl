<h1>Vector S</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>Alternatif</th>
            <th>Vector S</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $nos = 1;
            $jumlah = 0;
            $sum = 0;
            $hasil = array();
            $sqls = mysqli_query($db, "SELECT * FROM kriteria");
            while($b = mysqli_fetch_array($sqls)) {
                $sum = $sum + $b['bobot'];
            }
            $sql = mysqli_query($db, "SELECT * FROM alternatif");
            while($a = mysqli_fetch_array($sql)) { ?>
                <tr>
                    <td><?= $nos++ ?></td>
                    <td><?= $a['nama'] ?></td>
                    <td>
                        <?php
                            $S = 0;
                            $vector = array();
                            // $vector[] = 12;
                            // $vector[] = 13;
                            // print_r($vector);
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
                            echo round($S,4); 
                            $jumlah = $jumlah + $S;
                        ?>
                    </td>
                </tr>
            <?php } ?>
    </tbody>
</table>
<p>Jumlah : <?= round($jumlah, 4); ?></p>
<h1>Vector V</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>Alternatif</th>
            <th>Vector V</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $no = 1;
            $value = 0;
            $sql = mysqli_query($db, "SELECT * FROM alternatif");
            while($a = mysqli_fetch_array($sql)) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $a['nama'] ?></td>
                    <td>
                        <?php
                            echo $hasil[$value] / $jumlah;
                            $value = $value + 1;
                        ?>
                    </td>
                </tr>
            <?php } ?>
    </tbody>

</table>