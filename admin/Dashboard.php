 <?php
    require '../function.php';

    // jumlah barang

    $barang = mysqli_query($conn, "SELECT * FROM barang");

    $jumlah_barang = mysqli_num_rows($barang);

    // jumlah suplier

    $supplier = mysqli_query($conn, "SELECT * FROM suplier");

    $jumlah_supplier = mysqli_num_rows($supplier);


    // jumlah stok barang
    $stokBarang =query("SELECT SUM(stok_barang) FROM barang")[0]["SUM(stok_barang)"];
    

    // jumlah user

    $user = mysqli_query($conn, "SELECT * FROM user");

    $jumlah_user = mysqli_num_rows($user);




    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] == "") {
        header("location:../index.php");
    }

    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

     <title>SIBANGUN</title>
 </head>

 <body>
     <p style="text-align: right;"><?php echo $_SESSION['username']; ?>

         <a style="text-decoration: none;" href="../logout/logout.php">LOGOUT</a>
     </p>

     <p>SIBANGUN</p>
     <a href="dashboard.php">Dashboard</a>

     <hr>
     <p>inventory barang</p>
     <a href="suplier.php">Suplier</a> <br>
     <a href="barang.php">Barang Bangunan</a>

     <hr>
     <p>Transaksi</p>
     <a href="barangmasuk.php">Barang Masuk</a> <br>
     <a href="transaksi.php">Transaksi</a>

     <hr>
     <p>cetak</p>
     <a href="cetak.php">Cetak Laporan</a>

     <hr>
     <p>user</p>
     <a href="usermanagement.php">User Management</a>

     <h1 style="text-align: center;">Dashboard</h1>

     <p style="text-align: center;">Total Barang bangunan : <?php echo "$jumlah_barang"; ?></p>
     <p style="text-align: center;">Total Suplier : <?php echo "$jumlah_supplier"; ?></p>
     <p style="text-align: center;">Total Stok Barang : <?= $stokBarang; ?></p>
     <p style="text-align: center;">Total User : <?php echo "$jumlah_user"; ?></p>



     <p style="text-align: center;">copyright sibangun 2022</p>





















































 </body>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 </html>