<?php
    session_start();
    include "koneksi.php";
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $kategori =mysqli_query($koneksi, "SELECT *FROM kategori WHERE kategori_id = '".$_GET['id']."'");
    if(mysqli_num_rows($kategori) == 0){
        echo '<script>window.location"kategori.php"</script>';
    }
    $k = mysqli_fetch_object($kategori);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-widhht, initial-scale=1">
    <title>Edit Kategori | Db_olshop</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
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
            <h3>Edit Data Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control"
                    value="<?php echo $k->kategori_nama ?>">
                    <input type="submit" name="Edit" value="Edit" class="btn btn-warning btn-sm">
                </form>

                <?php
                    if(isset($_POST['Edit'])){
                        $nama = ucwords($_POST['nama']);

                        $update = mysqli_query($koneksi, "UPDATE kategori SET 
                        kategori_nama = '".$nama."' WHERE kategori_id = '".$k->kategori_id."' ");

                        if($update){
                            echo '<script>alert("Edit Data berhasil")</script>';
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
