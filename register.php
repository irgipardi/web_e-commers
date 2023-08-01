<!DOCTYPE html>
<html>
<head>
    <meta lang="en">
    <meta name="viewport" content="widht=device-widhht, initial-scale=1">
    <title>Register | Db_olshop</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="bg-login">
    <div class="box-login">
    <h2>Daftar</h2>
        <form action="simpan_admin.php" method="post">
                <label>Nama</label>
                <input type="text" name="nama_admin" class="form-control" placeholder="Masukan Nama">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukan Username">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                <label>No HP</label>
                <input type="text" name="tlp_admin" class="form-control" placeholder="Masukan No HP">
                <label>Email</label>
                <input type="email" name="email_admin" class="form-control" placeholder="Masukan Email">
                <label>Alamat </label>
                <input type="text" name="alamat_admin" class="form-control" placeholder="Masukan Alamat"><br>
                <input type="submit" name="submit" value="Daftar" class="btn btn-warning btn-sm">
                <p align="right">Sudah Punya Akun?<a href="login.php">Login</a></p>

    </form>
</div>
</body>
</html>