<?php
//Include file koneksi ke database
include "koneksi.php";

//menerima nilai dari kiriman form pendaftaran

$nama_admin=$_POST["nama_admin"];
$username=$_POST["username"];
$password=md5($_POST["password"]);
$tlp_admin=$_POST["tlp_admin"];
$email_admin=$_POST["email_admin"];
$alamat_admin=$_POST["alamat_admin"];
 //untuk password digunakan enskripsi md5


//Query input menginput data kedalam tabel anggota
  $insert="insert into admin (nama_admin, username, password, tlp_admin, email_admin, alamat_admin ) values
		('$nama_admin','$username','$password','$tlp_admin','$email_admin','$alamat_admin')";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($koneksi,$insert);

//Kondisi apakah berhasil atau tidak
if($insert){
    echo '<script>alert("Regitasi Berhasil")</script>';
    echo '<script>window.location="dashboard.php"</script>';
}else{
    echo 'Gagal'.mysqli_error($koneksi);
}



?>