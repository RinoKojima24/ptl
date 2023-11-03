<ul class="nav nav-pills nav-justify">
    <li class="nav-item">
        <a class="btn btn-primary" aria-current="page" href="index.php?page=kriteria">Kriteria</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=alternatif">Alternatif</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=data">Data</a>
    </li>
</ul>
<?php
    if(isset($_GET['id'])) { 
        $sans = mysqli_query($db, "SELECT * FROM kriteria WHERE id=".$_GET['id']);
        $data = mysqli_fetch_assoc($sans);
    }
    if(isset($_POST['simpan'])) {
        // if($_POST['bobot'] < 100) {
        //     $bobot =  "0.".$_POST['bobot'];;
        // } else {
        //     $bobot = 1;
        // }
        $sql = mysqli_query($db, "UPDATE kriteria SET kriteria='".$_POST['kriteria']."', bobot='".$_POST['bobot']."', atribut='".$_POST['atribut']."' WHERE id=".$_GET['id']);
        //header('location: index.php?page=kriteria');
        echo '<script>window.location.href = "index.php?page=kriteria";</script>';
    }
?>
<br>
<form action="" method="post">
    <div class="form-group">
        <label for="">Kriteria</label>
        <input type="text" name="kriteria" value="<?= $data['kriteria'] ?>" class="form-control" id="">
    </div>
    <br>
    <div class="form-group">
        <label for="">Bobot</label>
        <input type="number" name="bobot" max="100" class="form-control" value="<?= $data['bobot'] ?>" id="">
    </div>
    <br>
    <div class="form-group">
        <label for="">Atribut</label><br>
        <input type="radio" name="atribut" value="0" <?= ($data['atribut'] == 0 ) ? "checked" : "" ?> id=""> Benefit
        <input type="radio" name="atribut" value="1" <?= ($data['atribut'] == 1 ) ? "checked" : "" ?> id=""> Cost
    </div>
    <br>
    <div class="form-group">
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <button type="reset" name="reset" class="btn btn-primary">Reset</button>
    </div>
</form>