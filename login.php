<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body class="bg-light">

<?php 

    if(isset($_POST['login'])) {
        // mengaktifkan session php
        // menghubungkan dengan koneksi
        include 'config.php';
        
        // menangkap data yang dikirim dari form
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // menyeleksi data admin dengan username dan password yang sesuai
        $data = mysqli_query($db,"select * from pengguna where username='$username' and password='$password'");
        
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($data);
        
        if($cek > 0){
            session_start();
            $sapi = mysqli_fetch_assoc($data);
            $_SESSION['data'] = $sapi;
            $_SESSION['status'] = "login";
            header("location:index.php");
        }else{
            header("location:login.php?pesan=gagal");
        }
    }

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 card" style="margin: 0 auto;">
            <br>
            <center><h4>Masuk ke Aplikasi</h4></center>
            <br>

            <form action="" method="POST">

                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" placeholder="Username" />
                </div><br>


                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password" />
                </div><br>

                <center><input type="submit" class="btn btn-success btn-block" name="login" value="Masuk" /></center><br>

            </form>
            
        </div>

    </div>
</div>
    
</body>
</html>