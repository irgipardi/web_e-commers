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
    <title>Data Produk | Db_olshop</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>
<body>
    <!--header-->
        <header>
            <div class="container" >
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
            <h3>Data Produk</h3>
            <div class="box">
            <p><a href="tambah_produk.php" class="btn btn-warning btn-sm">Tambah Produk</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead class="table-dark">
                        <tr>
                            <th width="10px">No</th>
                            <th>Kategori</th>
                            <th>nama produk</th>
                            <th>Harga</th>
                            
                            <th>Gambar</th>
                            <th>Status</th>
   
                            <th width="13%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $Produk = mysqli_query($koneksi, "SELECT * FROM produk LEFT JOIN kategori USING (kategori_id) ORDER BY id_produk DESC");
                            if(mysqli_num_rows($Produk) > 0){

                           
                            while($row = mysqli_fetch_array($Produk)){

                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['kategori_nama'] ?> </td>
                            <td><?php echo $row['produk_name'] ?> </td>
                            <td>Rp. <?php echo number_format( $row['produk_harga']) ?> </td>
                            
                            <td><a href="Produk/<?php echo $row['gambar'] ?>" target="_blank" >
                            <img src="Produk/<?php echo $row['gambar'] ?>" width="80px"></a></td>
                            <td><?php echo ($row['produk_status'] == 0 )? 'tidak aktif':'Aktif'; ?></td>
                            <td>
                                <a href="edit_produk.php?id=<?php echo $row['id_produk'] ?>"class=" btn btn-warning btn-sm">Edit</a> || 
                                <a href="proses_hapus.php?idp=<?php echo $row['id_produk'] ?>" class="btn btn-dark btn-sm" 
                                onclick="return confirm('yakin ingin menghapusnya') ">Hapus</a>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                                <tr>
                                    <td colspan="7">Tidak ada Data Produk</td>
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
