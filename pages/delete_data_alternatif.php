<?php
    if(isset($_GET['id'])) {
        $sql = mysqli_query($db, "DELETE FROM alternatif WHERE id=".$_GET['id']."");
        //header('location: index.php?page=alternatif');
        echo '<script>window.location.href = "index.php?page=alternatif";</script>';
    }
?>