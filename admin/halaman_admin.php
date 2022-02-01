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
     <title>Halaman admin - www.malasngoding.com</title>
 </head>

 <body>

     <h1>Halaman Admin</h1>

     <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
     <a href="../logout/logout.php">LOGOUT</a>

     <br />
     <br />


     <h1>Sibangun</h1>
     <hr>
     <p style="text-align: right; font-size: 20px;">hai Admin</p>

     <a href="../Dashboard/Dashboard.php">Dashboard</a>
     <hr>

     <p>Inventory</p>
     <a href="../supplier/supplier.php">Suplier</a> <br>
     <a href="#">Barang Bangunan</a>
     <hr>

     <p>Transaksi</p>
     <a href="#">Barang Masuk</a> <br>
     <a href="#">Transaksi Penjualan</a>
     <hr>

     <p>Cetak</p>
     <a href="#">Cetak Laporan</a>
     <hr>

     <p>User</p>
     <a href="#">User Management</a>


 </body>

 </html>