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
<br>
<a href="index.php?page=form_tambah_alternatif" class="btn btn-outline-primary">Tambah data</a><br><br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Keterangan</th>
            <th>Aksi</th>
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
                    <td><?= $a['keterangan'] ?></td>
                    <td>
                        <a href="index.php?page=form_edit_alternatif&id=<?= $a['id'] ?>" class="btn btn-success">EDIT</a>
                        <a href="index.php?page=delete_data_alternatif&id=<?= $a['id'] ?>" class="btn btn-danger">DELETE</a>
                    </td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<p>Jumlah Data : <b><?= mysqli_num_rows($sql) ?></b> </p>