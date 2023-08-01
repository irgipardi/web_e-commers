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
    <title>Tambah produk | Db_olshop</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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
            <h3>Tambah Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                    <option value="">---Pilih---</option>
                    <?php
                        $kategori = mysqli_query($koneksi, "SELECT *FROM kategori ORDER BY kategori_id DESC");
                        while ($r = mysqli_fetch_array($kategori)){

                    ?>
                    <option value="<?php echo $r['kategori_id'] ?>"><?php echo $r['kategori_nama']?></option>

                    <?php } ?>
                    </select>

                    
                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                    <input type="file" name="gambar" class="input-control" required>
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br>
                    <select class="input-control" name="status">
                            <option value="">--Pilih--</option>
                            <option value="1">--Aktif--</option>
                            <option value="0">--Tidak Aktif--</option>
                    </select>
                    <input type="submit" name="Tambahkan" value="Tambahkan" class="btn btn-warning btn-sm">
                </form>

                <?php
                    if(isset($_POST['Tambahkan'])){

                        //print_r($_FILES['gambar']);
                        //menampung inputan dari form
                        $kategori   = $_POST['kategori'];
                        $nama       = $_POST['nama'];
                        $harga      = $_POST['harga'];
                        $deskripsi  = $_POST['deskripsi'];
                        $status     = $_POST['status'];

                        //menampung data file yang diupload
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];


                        $type1 =  explode('.',$filename);
                        $type2 = $type1[1];

                        $newname = 'produk'.time().'.'.$type2;

                        //menampung data format file yang diizinkan
                        $tipe_diizinkan = array('jpg','jpeg','png','gif');
                        //validasi format file
                        if(!in_array($type2, $tipe_diizinkan)){
                            //jika format file tidak ada didalam array tipe diizinkan
                            echo '<script>alert("Format file tidak diizinkan")</script>';
                        }else{
                            //jika format file sesuai dengan yang ada didalam array tipe diizinkan
                            move_uploaded_file($tmp_name,'./produk/'.$newname);


                            $insert = mysqli_query($koneksi, "INSERT INTO produk VALUES (
                                        null,
                                        '".$kategori."',
                                        '".$nama."',
                                        '".$harga."',
                                        '".$deskripsi."',
                                        '".$newname."',
                                        '".$status."',
                                        null 
                                            )");


                                if($insert){
                                    echo '<script>alert("simpan data berhasil")</script>';
                                    echo '<script>window.location="produk.php"</script>';
                                }else{
                                    echo 'gagal'.mysqli_error($koneksi);
                                }
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
