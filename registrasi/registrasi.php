<?php
require "../functions/function.php";

if (isset($_POST["register"])) {
    
    if (registrasi($_POST) > 0) {
        echo "<script>
            alert ('user baru berhasil ditambahkan');
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
</head>

<body>
    <h1>halaman registrasi</h1>

    <form action="" method="POST">
        
            <label for="namalengkap">nama lengkap :</label>
            <input type="text" name="namalengkap" id="namalengkap"> <br>
        

       
            <label for="alamat">Alamat :</label>
            <input type="text" name="alamat" id="alamat"> <br>
        
            <label for="notelp">NO telepon</label>
            <input type="text" name="notelp" id="notelp"> <br>
       
            <label for="tmptlahir">Tempat Lahir</label>
            <input type="text" name="tmplahir" id="tmptlahir"> <br>
        
            <label for="tgllahir">Tanggal Lahir</label>
            <input type="date" name="tgllahir" id="tgllahir"> <br>
      
        <hr>
       
            <label for="username">Username</label>
            <input type="text" name="username" id="username"> <br>
      
            <label for="password">password</label>
            <input type="password" name="password" id="password"> <br>
      
            <label for="password2">Verifikasi password</label>
            <input type="password" name="password2" id="passowrd2"> <br>
        
        <button type="submit" name="register">Register !</button>
    </form>
</body>

</html>