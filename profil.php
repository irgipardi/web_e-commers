<?php
    session_start();
    include "koneksi.php";
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $query = mysqli_query($koneksi, "select * from admin where id_admin='".$_SESSION['id_admin']."'");
    $d = mysqli_fetch_object($query);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-widhht, initial-scale=1">
    <title>Profil | Db_olshop</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>
<body>
    <!--header-->
        <header>
            <div class="container">
            <img src="img/logo2.png" width="100px">
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="kategori.php">Data Kategori</a></li>
                <li><a href="produk.php">Data Produk</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
        </div>
    </header>


    <!--kontent-->
    <div class="section">
        <div class="container">
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" 
                    value="<?php echo $d->nama_admin ?>" required>
                    <input type="text" name="user" placeholder="Username" class="input-control" 
                    value="<?php echo $d->username ?>" required>
                    <input type="text" name="tlp" placeholder="No Hp" class="input-control"
                    value="<?php echo $d->tlp_admin ?>" required>
                    <input type="email" name="email" placeholder="Email" class="input-control" 
                    value="<?php echo $d->email_admin ?>" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control" 
                    value="<?php echo $d->alamat_admin ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn btn-warning btn-sm">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $nama   = $_POST['nama'];
                        $user   = $_POST['user'];
                        $tlp    = $_POST['tlp'];
                        $email  = $_POST['email'];
                        $alamat = $_POST['alamat'];

                        $update = mysqli_query($koneksi, "UPDATE admin SET
                                        nama_admin = '".$nama."',
                                        username = '".$user."',
                                        tlp_admin = '".$tlp."',
                                        email_admin = '".$email."',
                                        alamat_admin = '".$alamat."'
                                        WHERE id_admin = '".$d->id_admin."'");

                        if($update){
                            echo '<script>alert("Ubah Data Berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        }else{
                            echo 'Gagal'.mysqli_error($koneksi);
                        }

                    }


                ?>
            </div>

            <h4>Ubah password</h4>
            <div class="box">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control" 
                    required>
                    <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" 
                    required>
                   
                    <input type="submit" name="ubah_password" value="Ubah Password" class="btn btn-warning btn-sm">
                </form>
                <?php
                    if(isset($_POST['ubah_password'])){
                        $pass1   = $_POST['pass1'];
                        $pass2   = $_POST['pass2'];
                        
                        if($pass2 != $pass1){
                            echo '<script>alert("Konfirmasi Password Tidak Sesuai")</script>';
                        }else{

                            $updt_pass = mysqli_query($koneksi, "UPDATE admin SET
                                        password = '".md5($pass1)."'
                                        WHERE id_admin = '".$d->id_admin."'");

                            if($updt_pass){

                                echo '<script>alert("Ubah Password Berhasil")</script>';
                                echo '<script>window.location="profil.php"</script>';
                            }else{
                                echo 'Gagal'.mysqli_error($koneksi);
                            }
                        }                      
                    }


                ?>
            </div>

        </div>

    </div>

    <!--footer-->
    <footer>
        <div class="container">
            <small>Copyraight &copy; 2022 - online shop.</small>

        </div>
    </footer>


</body>
</html>
