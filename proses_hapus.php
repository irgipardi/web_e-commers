<?php
    include 'koneksi.php';

    if(isset($_GET['idk'])){
        $delete = mysqli_query($koneksi, "DELETE FROM kategori WHERE kategori_id = '".$_GET['idk']."' ");
        echo '<script>window.location="kategori.php"</script>';
    }

    if(isset($_GET['idp'])){
        $produk = mysqli_query($koneksi,"SELECT gambar FROM produk WHERE id_produk = '".$_GET['idp']."' ");
        $p = mysqli_fetch_object($produk);

        unlink('./produk/'.$p->gambar);

        $delete = mysqli_query($koneksi, " DELETE FROM produk WHERE id_produk = '".$_GET['idp']."' ");
        echo '<script>window.location ="produk.php"</script>';
    }
    
?>