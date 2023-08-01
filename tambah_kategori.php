<?php
    session_start();
    include "koneksi.php";
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-widhht, initial-scale=1">
    <title>Tambah kategori | Db_olshop</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <!--header-->
        <header>
            <div class="container">
            <h1><a href="dashboard.php">OnlineShop</a></h1>
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
            <h3>Tambah Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
                    <input type="submit" name="Tambahkan" value="Tambahkan" class="btn btn-warning btn-sm">
                </form>

                <?php
                    if(isset($_POST['Tambahkan'])){
                        $kategori_nama =($_POST['nama']);

                        $insert = mysqli_query($koneksi, " INSERT INTO kategori
                        VALUES ( null,'".$kategori_nama."') ");

                        if($insert){
                            echo '<script>alert("Tambah Data berhasil")</script>';
                            echo '<script>window.location="kategori.php"</script>';
                        }else{
                            echo 'Gagal'.mysqli_error($koneksi);
                        }
                        
                    }
                ?>
                
            </div>

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
