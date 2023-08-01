<?php
    session_start();
    include 'koneksi.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-widhht, initial-scale=1">
    <title>Kategori | Db_olshop</title>
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
            <h3>Data Kategori</h3>
            <div class="box">
            <p><a href="tambah_kategori.php" class="btn btn-warning btn-sm">Tambah Kategori</a></p><br>
                <table border="1" cellspacing="0" class="table">
                    <thead class="table-dark">
                        <tr>
                            <th width="10px">No</th>
                            <th>Kategori</th>
                            <th width="13%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY kategori_id DESC");
                            if(mysqli_num_rows($kategori) > 0){
                                while($row = mysqli_fetch_array($kategori)){

                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['kategori_nama'] ?> </td>
                            <td>
                                <a href="edit_kategori.php?id=<?php echo $row['kategori_id'] ?>" class="btn btn-warning btn-sm">Edit</a> || 
                                <a href="proses_hapus.php?idk=<?php echo $row['kategori_id'] ?>" class="btn btn-dark btn-sm" onclick="return confirm('yakin ingin menghapusnya') ">Hapus</a>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                                <tr>
                                <td colspan="3">Tidak Ada Data Kategori</td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
               

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
