<?php
    ob_start();
    if(isset($_GET['id'])) {
        $sql = mysqli_query($db, "DELETE FROM kriteria WHERE id=".$_GET['id']."");
        //header('location: index.php?page=kriteria');
        echo '<script>window.location.href = "index.php?page=kriteria";</script>';
    }
?>