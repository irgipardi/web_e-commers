<?php
    include 'koneksi.php';
    $kontak = mysqli_query($koneksi, "SELECT tlp_admin, email_admin, alamat_admin FROM admin WHERE id_admin ");
    $a = mysqli_fetch_object($kontak);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-widhht, initial-scale=1">
    <title>Db_olshop</title>
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
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </header>

    <!--pencarian-->
    <div class="search">
        <div class="container">
            <form action="barang.php">
                <input type="text" name="search" placeholder="Cari">
                <input type="submit" name="cari" value="Cari">
            </form>
        </div>
    </div>

    <!--kategori-->
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php
                    $kategori = mysqli_query($koneksi, "SELECT *FROM kategori ORDER BY kategori_id DESC");
                    if(mysqli_num_rows($kategori) > 0){
                        while($k = mysqli_fetch_array($kategori)){
                    
                ?>

                        <a href="barang.php?kat=<?php echo $k['kategori_id']?>">
                        <div class="col-5">
                            <img src="img/kategori.png" width="50px" style="margin-bottom:5px;">
                            <p><?php echo $k['kategori_nama'] ?></p>
                        </div>
                    </a>
            <?php }}else{ ?>
                <p>Kategori Tidak Ada</p>

            <?php } ?>
        </div>
    </div>
</div>


        
    <!--new produk-->
    <div class="section">
        <div class="container">
            <h3>Produk Terbaru</h3>
            <div class="box">
                
                <?php
                    $produk=mysqli_query($koneksi, "SELECT *FROM produk WHERE produk_status = 1 ORDER BY id_produk DESC LIMIT 8");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){

                ?>
                        <a href="detail_produk.php?id=<?php echo $p['id_produk'] ?>">
                        <div class="col-4">
                            <img src="produk/<?php echo $p['gambar'] ?>">
                            <p class="nama"><?php echo $p['produk_name'] ?></p>
                            <p class="harga">Rp. <?php echo number_format( $p['produk_harga'] ) ?></p>
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
