<?php
    error_reporting(0);
    include 'koneksi.php';
    $kontak = mysqli_query($koneksi, "SELECT tlp_admin, email_admin, alamat_admin FROM admin WHERE id_admin");
    $a = mysqli_fetch_object($kontak);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-widhht, initial-scale=1">
    <title>Produk | Db_olshop</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!--header-->
        <header>
            <div class="container">
            <h1><a href="index.php">OnlineShop</a></h1>
            <ul>
                <li><a href="barang.php">Produk</a></li>
            </ul>
        </div>
    </header>

    <!--pencarian-->
    <div class="search">
        <div class="container">
            <form action="barang.php">
                <input type="text" name="search" placeholder="Cari" value="<?php echo $_GET['search'] ?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat']?>">
                <input type="submit" name="cari" value="Cari">
            </form>
        </div>
    </div>

        
    <!--new produk-->
    <div class="section">
        <div class="container">
            <h3>Produk</h3>
            <div class="box">
                <?php
                    if($_GET['search'] != '' or $_GET['kat'] != ''){
                        $where = "AND produk_name LIKE '%".$_GET['search']."%' 
                                AND kategori_id LIKE '%".$_GET ['kat']."%' ";
                    }

                    $produk=mysqli_query($koneksi, "SELECT *FROM produk WHERE produk_status = 1 $where ORDER BY id_produk DESC");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){

                ?>
                        <a href="detail_produk.php?id=<?php echo $p['id_produk'] ?>">
                        <div class="col-4">
                            <img src="produk/<?php echo $p['gambar'] ?>">
                            <p class="nama"><?php echo $p['produk_name'] ?></p>
                            <p class="harga">Rp. <?php echo number_format($p['produk_harga']) ?></p>
                        </div>
                    </a>
                <?php }}else{ ?>
                    <p>produk Tidak Ada</p>
                <?php }?>
            </div>
        </div>
    </div>
        <!--footer--> 
        <div class="footer">
            <div class="container">

                <h4>Alamat</h4>
                <p><?php echo $a->alamat_admin ?></p>

                <h4>Email</h4>
                <p><?php echo $a->email_admin ?></p>

                <h4>No. Hp</h4>
                <p><?php echo $a->tlp_admin ?></p><br>

                <small>Copyright &copy; 2022 - OnlineShop</small>
            </div>
        </div>
</body>
</html>
