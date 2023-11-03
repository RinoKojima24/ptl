<!DOCTYPE html>
<html>
<head>
    <title>Cara Menghitung Pangkat di PHP</title>
</head>
<body>
    <h3>Script PHP untuk Menghitung Pangkat dengan Fungsi pow()</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Nilai Bilangan</td>
                <td>:</td>
                <td><input name="bilangan" type="number"/></td>
            </tr>
            <tr>
                <td>Pangkat</td>
                <td>:</td>
                <td><input name="pangkat" type="number"/></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input name="submit" type="submit" value="SUBMIT"/></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                <?php
                    if(isset($_POST['submit'])){
                        $bilangan    =$_POST["bilangan"];
                        $pangkat    =$_POST["pangkat"];
                        $hasil    =pow($bilangan, $pangkat);
                        echo '<br />';
                        echo $bilangan; echo'<sup>'.$pangkat.'</sup>'; echo" = ";echo $hasil;
                    }
                ?>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>