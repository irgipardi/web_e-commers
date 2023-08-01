<?php
    session_start();
    include "koneksi.php";
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $produk = mysqli_query($koneksi, "SELECT *FROM produk WHERE id_produk ='".$_GET['id']."' ");
    if(mysqli_num_rows($produk) == 0){
        echo '<script>window.location="produk.php"</script>';
    }
    $p =mysqli_fetch_object($produk);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-widhht, initial-scale=1">
    <title>Edit Produk | Db_olshop</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
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
            <h3>Edit Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                    <option value="">---Pilih---</option>
                    <?php
                        $kategori = mysqli_query($koneksi, "SELECT *FROM kategori ORDER BY kategori_id DESC");
                        while ($r = mysqli_fetch_array($kategori)){

                    ?>
                    <option value="<?php echo $r['kategori_id'] ?>"
                    <?php echo ($r['kategori_id']==$p->kategori_id) ? 'selected':''; ?>>
                    <?php echo $r['kategori_nama']?></option>

                    <?php } ?>
                    </select>

                    
                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" 
                    value="<?php echo $p->produk_name?>" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" 
                    value="<?php echo $p->produk_harga?>" required>
                    
                    <img src="produk/<?php echo $p->gambar ?>" width="100px">
                    <input type="hidden" name="foto" value="<?php echo $p->gambar ?>">
                    <input type="file" name="gambar" class="input-control" >
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->deskripsi?></textarea><br>
                    <select class="input-control" name="status">
                            <option value="">--Pilih--</option>
                            <option value="1" <?php echo ($p->produk_status == 1)? 'selected':'' ?>>--Aktif--</option>
                            <option value="0" <?php echo ($p->produk_status == 0)? 'selected':'' ?>>--Tidak Aktif--</option>
                    </select>
                    <input type="submit" name="update" value="update" class="btn">
                </form>

                <?php
                    if(isset($_POST['update'])){

                        //data inputan dari form
                        $kategori   = $_POST['kategori'];
                        $nama       = $_POST['nama'];
                        $harga      = $_POST['harga'];
                        $deskripsi  = $_POST['deskripsi'];
                        $status     = $_POST['status'];
                        $foto       = $_POST['foto'];
                        //tampung data gambar baru
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];


                       

                        //validasi jika admin ganti gambar
                        if($filename != ''){
                            $type1 =  explode('.',$filename);
                            $type2 = $type1[1];
    
                            $newname = 'produk'.time().'.'.$type2;
    
                            //menampung data format file yang diizinkan
                            $tipe_diizinkan = array('jpg','jpeg','png','gif');

                            if(!in_array($type2, $tipe_diizinkan)){
                                //jika format file tidak ada didalam array tipe diizinkan
                                echo '<script>alert("Format file tidak diizinkan")</script>';
                            }else{
                                unlink('./produk/'.$foto);
                                move_uploaded_file($tmp_name,'./produk/'.$newname);
                                $nama_gmbr = $newname;
                            }

                        }else{
                            //jika admin tidak ganti gambar
                            $nama_gmbr = $foto;
                        
                        }
                        //query update data produk
                        $update = mysqli_query($koneksi, " UPDATE produk SET kategori_id = '".$kategori."',
                                                                                produk_name = '".$nama."',
                                                                                produk_harga = '".$harga."',
                                                                                deskripsi = '".$deskripsi."',
                                                                                gambar = '".$nama_gmbr."',
                                                                                produk_status = '".$status."'
                                                                                WHERE id_produk = '".$p->id_produk."'  ");
                            if($update){
                                echo '<script>alert("Ubah data berhasil")</script>';
                                echo '<script>window.location="produk.php"</script>';
                            }else{
                                echo 'gagal'.mysqli_error($koneksi);
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
    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>

</body>
</html>
