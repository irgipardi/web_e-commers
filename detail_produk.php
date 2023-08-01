<?php
    error_reporting(0);
    include 'koneksi.php';
    $kontak = mysqli_query($koneksi, "SELECT tlp_admin, email_admin, alamat_admin FROM admin WHERE id_admin = 1");
    $a = mysqli_fetch_object($kontak);

    $produk = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);

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
    <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box">
                <div class="col-2">
                    <img src="produk/<?php echo $p->gambar ?>"width="80%">
                </div>

                <div class="col-2">
                    <h3><?php echo $p->produk_name ?></h3>
                    <h4>Rp. <?php echo number_format($p->produk_harga) ?></h4><br>
                    <p>Deskripsi :<br><?php echo $p->deskripsi ?>
                </p>
                <p><a href="https://api.whatsapp.com/send?phone=<?php echo $a->tlp_admin ?>
                &text=Hai, saya tertarik dengan produk anda." target="_blank">
                <img src="img/wa.png" width="40px"> Hubungi Via Whatsapps :)</a></p>

                    

                </div>

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
