<ul class="nav nav-pills nav-justify">
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="index.php?page=kriteria">Kriteria</a>
    </li>
    <li class="nav-item">
        <a class="btn btn-primary" href="index.php?page=alternatif">Alternatif</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=data">Data</a>
    </li>
</ul>
<?php
    if(isset($_POST['simpan'])) {
        $sql = mysqli_query($db, "INSERT INTO alternatif(nama, keterangan) VALUES ('".$_POST['nama']."', '".$_POST['keterangan']."')");
        //header('location: index.php?page=alternatif');
        echo '<script>window.location.href = "index.php?page=alternatif";</script>';
    }
?>
<br>
<form action="" method="post">
    <div class="form-group">
        <label for="">Nama</label>
        <input type="text" name="nama" class="form-control" id="">
    </div>
    <br>
    <div class="form-group">
        <label for="">Keterangan</label>
        <textarea name="keterangan" class="form-control" id="" cols="30" rows="10"></textarea>
    </div>
    <br>
    <div class="form-group">
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <button type="reset" name="reset" class="btn btn-primary">Reset</button>
    </div>
</form>