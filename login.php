<!DOCTYPE html>
<html>
<head>
    <meta lang="en">
    <meta name="viewport" content="widht=device-widhht, initial-scale=1">
    <title>Login | Db_olshop</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Login</h2>
        
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control">
            <input type="submit" name="submit" value="Login" class="btn btn-warning btn-sm"><br><br><br>
            <p align="left">Belum Punya Akun?<a href="register.php">Register</a></p>
        </form>
        
        <?php
            if(isset($_POST['submit'])){
                session_start();
                include 'koneksi.php';

                $user = mysqli_real_escape_string($koneksi,  $_POST['user']);
                $pass = mysqli_real_escape_string($koneksi,  $_POST['pass']);

                $cek = mysqli_query($koneksi, "SELECT * FROM admin WHERE username ='".$user."'AND password = '".md5($pass). "'");
                if (mysqli_num_rows($cek)>0){
                    
                    $d = mysqli_fetch_object($cek);
                    $_SESSION['status_login'] = true;
                    $_SESSION['admin_global'] = $d;
                    $_SESSION['id_admin'] = $d->id_admin;

                    
                    echo '<script>window.location="dashboard.php"</script>';
                }else{
                    echo '<script>alert("username atau password Anda Salah")</script>';
                }
            }

        ?>
    </div>
</body>
</html>
