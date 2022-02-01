 <?php
    require '../function.php';
    $barang = query("SELECT * FROM barang");

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

     <h1 style="text-align: center;">Barang</h1>

     <h1>Data Barang</h1>



     <form action="" method="get">
         <button type="submit" name="tambah">Tambah Suplier</button> <br>

         <label for="show">Show</label>
         <input type="number" name="show" id="show"> <br>

         <label for="cari">Search</label>
         <input type="text" name="cari" id="cari"> <br>

         <table class="table table-striped table-hover container">
             <thead>
                 <tr>
                     <th scope="col">NO</th>
                     <th scope="col">Kode Barang</th>
                     <th scope="col">Nama Barang</th>
                     <th scope="col">Jenis Barang</th>
                     <th scope="col">Satuan</th>
                     <th scope="col">Harga Pokok</th>
                     <th scope="col">Harga Jual</th>
                     <th scope="col">Stok</th>
                     <th scope="col">Aksi</th>
                 </tr>
             </thead>
             <?php $i = 1; ?>
             <?php foreach ($barang as $brg) : ?>
                 <tbody>
                     <tr>
                         <th scope="row"><?= $i; ?></th>
                         <td><?= $brg["kode_barang"]; ?></td>
                         <td><?= $brg["nama_barang"]; ?></td>
                         <td><?= $brg["jenis_barang"]; ?></td>
                         <td><?= $brg["satuan_barang"]; ?></td>
                         <td><?= $brg["harga_pokok"]; ?></td>
                         <td><?= $brg["harga_jual"]; ?></td>
                         <td><?= $brg["stok_barang"]; ?></td>
                         <td>
                             <a href="#">Ubah</a> |
                             <a href="#">Hapus</a>
                         </td>

                     </tr>
                     <?php $i++; ?>
                 <?php endforeach; ?>


                 </tbody>
         </table>

     </form>
 </body>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 </html>