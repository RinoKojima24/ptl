<ul class="nav nav-pills nav-justify">
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="index.php?page=kriteria">Kriteria</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=alternatif">Alternatif</a>
    </li>
    <li class="nav-item">
        <a class="btn btn-primary" href="index.php?page=data">Data</a>
    </li>
</ul>
<br>
<!-- <a href="index.php?page=form_tambah_kriteria" class="btn btn-outline-primary">Tambah data</a><br><br> -->
<?php  
    if(isset($_POST['save'])) {
        $sql = mysqli_query($db, "SELECT * FROM alternatif");
        while($a = mysqli_fetch_array($sql)) {
            $kriteria = mysqli_query($db, "SELECT * FROM kriteria");
            while($b = mysqli_fetch_array($kriteria)) {
                $tes = mysqli_query($db, "SELECT * FROM data WHERE alternatif_id='".$a['id']."' AND kriteria_id='".$b['id']."'");
                $check = mysqli_fetch_assoc($tes);
                $number = 0;
                if($_POST['input_'.$a['id'].'_'.$b['id'].''] != "") {
                    $number = $_POST['input_'.$a['id'].'_'.$b['id'].''];
                }
                if(mysqli_num_rows($tes) <= 0) {
                    $hasil = mysqli_query($db, "INSERT INTO data(alternatif_id, kriteria_id, number) VALUES ('".$a['id']."', '".$b['id']."','".$number."')");
                } else if($_POST['input_'.$a['id'].'_'.$b['id'].''] != "") {
                    $hasil = mysqli_query($db, "UPDATE data SET number='".$number."' WHERE alternatif_id='".$a['id']."' AND kriteria_id='".$b['id']."'");
                    //echo $number."|";
                }
                //header('location: index.php?page=alternatif');
            }
        }
        echo '<script>window.location.href = "index.php?page=data";</script>';
    }
?>
<form action="" method="post">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
                <th>Alternatif</th>
                <?php
                    $no = 1;
                    $sql = mysqli_query($db, "SELECT * FROM kriteria");
                    while($a = mysqli_fetch_array($sql)) { ?> 
                        <th>C<?= $no++ ?></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;
                $sql = mysqli_query($db, "SELECT * FROM alternatif");
                while($a = mysqli_fetch_array($sql)) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $a['nama'] ?></td>
                        <?php
                        $kriteria = mysqli_query($db, "SELECT * FROM kriteria");
                        while($b = mysqli_fetch_array($kriteria)) { ?> 
                            <td><input type="text" name="input_<?= $a['id'] ?>_<?= $b['id'] ?>" class="form-control"></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
    <button type="submit" name="save" class="btn btn-danger">SIMPAN</button>
</form>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>Alternatif</th>
            <?php
                $no = 1;
                $sql = mysqli_query($db, "SELECT * FROM kriteria");
                while($a = mysqli_fetch_array($sql)) { ?> 
                    <th>C<?= $no++ ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php 
            $no = 1;
            $sql = mysqli_query($db, "SELECT * FROM alternatif");
            while($a = mysqli_fetch_array($sql)) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $a['nama'] ?></td>
                    <?php
                        $data = mysqli_query($db, "SELECT * FROM data WHERE alternatif_id='".$a['id']."'");
                        while($b = mysqli_fetch_array($data)) { ?> 
                            <td><?= $b['number'] ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
    </tbody>
</table>
<p>Jumlah Data : <b><?= mysqli_num_rows($sql) ?></b> </p>