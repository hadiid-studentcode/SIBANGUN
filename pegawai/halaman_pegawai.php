 <?php
    session_start();



    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] == "") {
        header("location:../index.php");
    }

    ?>
 <!DOCTYPE html>
 <html>

 <head>
     <title>Halaman pegawai - sibangun</title>
 </head>

 <body>

     <h1>Halaman pegawai</h1>

     <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
     <a href="../logout/logout.php">LOGOUT</a>

     <br />
     <br />


 </body>

 </html>