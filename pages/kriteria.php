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
<br>
<a href="index.php?page=form_tambah_kriteria" class="btn btn-outline-primary">Tambah data</a><br><br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>Kriteria</th>
            <th>Bobot pertama</th>
            <th>Bobot Kedua</th>
            <th>Atribut</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $no = 1;
            $sum = 0;
            $sqls = mysqli_query($db, "SELECT * FROM kriteria");
            while($b = mysqli_fetch_array($sqls)) {
                $sum = $sum + $b['bobot'];
            }
            $sql = mysqli_query($db, "SELECT * FROM kriteria");
            while($a = mysqli_fetch_array($sql)) { ?>
                
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $a['kriteria'] ?></td>
                    <td><?= $a['bobot'] ?></td>
                    <td><?= $a['bobot'] / $sum ?></td>
                    <td><?= ($a['atribut'] == 0) ? "Benefit" : "Cost" ?></td>
                    <td>
                        <a href="index.php?page=form_edit_kriteria&id=<?= $a['id'] ?>" class="btn btn-success">EDIT</a>
                        <a href="index.php?page=delete_data_kriteria&id=<?= $a['id'] ?>" class="btn btn-danger">DELETE</a>
                    </td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<p>Jumlah Data : <b><?= mysqli_num_rows($sql) ?></b> </p>
<p>Jumlah semua bobot : <?= $sum ?></p>