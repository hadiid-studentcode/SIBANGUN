 <?php
    require "../function.php";
    

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] == "") {
        header("location:../index.php");
    }

    // pagination
    // konfigurasi
    $jumlahDataPerHalaman = 5;
    $jumlahData = count(query("SELECT * FROM suplier"));
    $jumlahhalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;






    $supplier = mysqli_query($conn, "SELECT * FROM suplier LIMIT $awalData,$jumlahDataPerHalaman");

    // tombol cari ditekan

    if (isset($_POST['cari'])) {
        $supplier = cari($_POST['keyword']);
    }



    // tambah data supplier

    // cek apakah tombol submit sudah ditekan atau belum

    if (isset($_POST["tambahdata"])) {

        // cek apakah data berhasil ditambahkan atau tidak

        if (tambah($_POST) > 0) {
            echo "
            <script>
            alert ('data berhasil ditambahkan !');
            document.location.href = 'suplier.php';
            </script>
        ";
        } else {
            echo "
            <script>
            alert ('data gagal  diubah !');
            document.location.href = 'suplier.php';
            </script>
        ";
        }
    }

    // ubah data supplier
    // cek apakah tombil submit ubah sudah ditekan atau belum

    if (isset($_POST["ubahdata"])) {
        // cek apakah data berhasil diubah atau tidak

        if (ubah($_POST) > 0) {
            echo "
            <script>
            alert ('data berhasil diubah !');
            document.location.href = 'suplier.php';
            </script>
        ";
        } else {
            echo "
            <script>
            alert ('data gagal diubah !');
            document.location.href = 'suplier.php';
            </script>
        ";
        }
    }




    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
     <link rel="icon" type="image/png" href="../dist/images/icons/logo.png">
     <title>SIBANGUN</title>
     <!--     Fonts and icons     -->
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
     <!-- Nucleo Icons -->
     <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
     <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
     <!-- Font Awesome Icons -->
     <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
     <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
     <!-- CSS Files -->
     <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.0" rel="stylesheet" />
     <!--library alert -->
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 </head>

 <body class="g-sidenav-show   bg-gray-100">
     <div class="min-height-300 bg-primary position-absolute w-100"></div>
     <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">

         <div class="sidenav-header">
             <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
             <a class="navbar-brand m-0" href="dashboard.php">
                 <img src="../dist/images/icons/logo.png" class="navbar-brand-img h-100" alt="main_logo">
                 <span class="ms-1 font-weight-bold">SIBANGUN</span>
             </a>
         </div>
         <hr class="horizontal dark mt-0">
         <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
             <ul class="navbar-nav">
                 <li class="nav-item">
                     <a class="nav-link active" href="dashboard.php">
                         <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                         </div>
                         <span class="nav-link-text ms-1">Dashboard</span>
                     </a>
                 </li>
                 <li class="nav-item mt-3">
                     <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Inventory</h6>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="suplier.php">
                         <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                         </div>
                         <span class="nav-link-text ms-1">Supplier</span>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="barang.php">
                         <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                         </div>
                         <span class="nav-link-text ms-1">Barang Bangunan</span>
                     </a>
                 </li>
                 <li class="nav-item mt-3">
                     <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Transaksi</h6>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="barangmasuk.php">
                         <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="ni ni-app text-info text-sm opacity-10"></i>
                         </div>
                         <span class="nav-link-text ms-1">Barang Masuk</span>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="transaksi.php">
                         <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                         </div>
                         <span class="nav-link-text ms-1">Transaksi Penjualan</span>
                     </a>
                 </li>
                 <li class="nav-item mt-3">
                     <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Cetak</h6>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="cetak.php">
                         <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                         </div>
                         <span class="nav-link-text ms-1">Cetak Laporan</span>
                     </a>
                 </li>
                 <li class="nav-item mt-3">
                     <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">User</h6>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="usermanagement.php">
                         <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                         </div>
                         <span class="nav-link-text ms-1">User management</span>
                     </a>
                 </li>

             </ul>
         </div>

     </aside>
     <main class="main-content position-relative border-radius-lg ">
         <!-- Navbar -->
         <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
             <div class="container-fluid py-1 px-3">
                 <nav aria-label="breadcrumb">
                     <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                         <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="dashboard.php">Dashboard</a></li>
                         <li class="breadcrumb-item text-sm text-white active" aria-current="page">Supplier</li>
                     </ol>
                     <h6 class="font-weight-bolder text-white mb-0">Supplier</h6>
                 </nav>
                 <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                     <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                         <!-- form pencarian -->
                         <form action="" method="POST">
                             <div class="input-group">
                                 <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                 <button type="submit" name="cari" id="tombol-cari" hidden='true'>Cari</button>
                                 <input type="text" class="form-control" autofocus autocomplete="off" id="keyword" placeholder="Cari Supplier.." name="keyword">

                             </div>
                         </form>
                         <!-- akhir form pencarian -->
                     </div>
                     <ul class="navbar-nav  justify-content-end">
                         <li class="nav-item d-flex align-items-center">
                             <a href="#" class="nav-link text-white font-weight-bold px-0">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                     <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                 </svg>
                                 <span class="d-sm-inline d-none"><?php echo $_SESSION['username']; ?> |</span>


                             </a>

                         </li>

                         <li class="nav-item px-3 d-flex align-items-center">
                             <a href="../logout/logout.php" class="nav-link text-white p-0">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                     <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                     <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                 </svg>
                                 <span class="d-sm-inline d-none">Logout</span>

                             </a>
                         </li>



                     </ul>
                 </div>
             </div>
         </nav>
         <!-- End Navbar -->
         <div class="col-12 container">
             <div class="card mb-4">
                 <div class="card-header pb-0">
                     <h6>Data Supplier</h6>



                     <div data-bs-toggle="modal" data-bs-target="#tambahdata" style="float: right;">
                         <button class="btn bg-gradient-primary mb-0"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                 <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                 <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                             </svg>&nbsp;&nbsp;Tambah Supplier</button>


                     </div>
                     <!-- navigasi -->
                     <nav aria-label="Page navigation example">
                         <ul class="pagination">
                             <li class="page-item">
                                 <?php if ($halamanAktif > 1) : ?>
                                     <a class="page-link" href="?page=<?= $halamanAktif - 1; ?>" aria-label="Previous">

                                         <span aria-hidden="true">&laquo;</span>
                                     </a>
                                 <?php endif; ?>
                             </li>
                             <?php for ($i = 1; $i <= $jumlahhalaman; $i++) : ?>
                                 <?php if ($i == $halamanAktif) : ?>
                                     <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a></li>
                                 <?php else : ?>
                                     <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                                 <?php endif; ?>
                             <?php endfor; ?>
                             <li class="page-item">
                                 <?php if ($halamanAktif < $jumlahhalaman) : ?>
                                     <a class="page-link" href="?page=<?= $halamanAktif + 1; ?>" aria-label="Next">
                                         <span aria-hidden="true">&raquo;</span>
                                     </a>
                                 <?php endif; ?>
                             </li>
                         </ul>
                     </nav>
                     <!-- end -->

                     <!-- modal -->



                     <!-- Modal -->
                     <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="tambahdata" aria-hidden="true">
                         <div class="modal-dialog">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel">Tambah Data Suplier</h5>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" name="tambahdata"></button>
                                 </div>
                                 <div class="modal-body">
                                     <!-- form -->
                                     <form action="" method="POST">

                                         <div class="mb-3">
                                             <label for="nama_supplier" class="form-label">Nama Supplier</label>
                                             <input type="text" class="form-control" id="nama_supplier" placeholder="masukkan nama" name="nama_supplier">
                                         </div>
                                         <div class="mb-3">
                                             <label for="notelp_supplier" class="form-label">No.Telepon</label>
                                             <input type="number" class="form-control" id="notelp_supplier" placeholder="masukkan nomor telepon" name="notelp_supplier">
                                         </div>
                                         <div class="mb-3">
                                             <label for="alamat_supplier" class="form-label">Alamat Supplier</label>
                                             <input type="text" class="form-control" id="alamat_supplier" placeholder="masukkan Alamat Supplier" name="alamat_supplier">
                                         </div>
                                         <div class="mb-3">
                                             <label for="keterangan_supplier" class="form-label">Keterangan</label>
                                             <input type="text" class="form-control" id="keterangan_supplier" placeholder="Keterangan" name="keterangan_supplier">
                                         </div>



                                 </div>
                                 <div class="modal-footer" name="tambahdata">
                                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                     <button type="submit" class="btn btn-primary" name="tambahdata" id="liveAlertBtn">Simpan Data</button>
                                 </div>
                                 </form>
                                 <!-- form -->
                             </div>
                         </div>
                     </div>
                     <!-- akhir modal -->


                 </div>
                 <div class="card-body px-0 pt-0 pb-2">
                     <div class="table-responsive p-0">
                         <div id="container">
                             <table class="table align-items-center mb-0">
                                 <thead>
                                     <tr>
                                         <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                         <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                                         <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Telepon</th>
                                         <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                                         <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                         <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                     </tr>
                                 </thead>
                                 <?php $i = 1; ?>
                                 <?php if (is_array($supplier) || is_object($supplier)) : ?>
                                     <?php foreach ($supplier as $spl) : ?>
                                         <tbody>
                                             <tr scope="row">
                                                 <td>
                                                     <div class="d-flex px-2 py-1">

                                                         <div class="d-flex flex-column justify-content-center">
                                                             <h6 class="mb-0 text-sm"><?= $i; ?></h6>

                                                         </div>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <p class="text-xs font-weight-bold mb-0"><?= $spl["nama_suplier"]; ?></p>

                                                 </td>
                                                 <td class="align-middle text-center text-sm">
                                                     <span class="badge badge-sm bg-gradient-success"><?= $spl["no_telp_suplier"]; ?></span>
                                                 </td>
                                                 <td class="align-middle text-center">
                                                     <span class="text-secondary text-xs font-weight-bold"><?= $spl["alamat_suplier"]; ?></span>
                                                 </td>
                                                 <td class="align-middle text-center">
                                                     <span class="text-secondary text-xs font-weight-bold"><?= $spl["keterangan"]; ?></span>
                                                 </td>

                                                 <td class="align-middle">
                                                     <a data-bs-toggle="modal" data-bs-target="#ubahdata<?= $spl["id_suplier"]; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit suplier">
                                                         <button type="button" class="btn ">
                                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FF8C00" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                 <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                 <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                             </svg>

                                                         </button>
                                                     </a>

                                                     <!-- Modal -->
                                                     <div class="modal fade" id="ubahdata<?= $spl['id_suplier']; ?>" tabindex="-1" aria-labelledby="ubahdata" aria-hidden="true">
                                                         <div class="modal-dialog">
                                                             <div class="modal-content">
                                                                 <div class="modal-header">
                                                                     <h5 class="modal-title" id="exampleModalLabel">Ubah Data Suplier</h5>
                                                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" name="ubahdata"></button>
                                                                 </div>
                                                                 <div class="modal-body">
                                                                     <!-- form -->
                                                                     <form action="" method="POST">

                                                                         <input type="hidden" name="id_suplier" value="<?= $spl["id_suplier"]; ?>">
                                                                         <div class="mb-3">
                                                                             <label for="nama_supplier" class="form-label">Nama Supplier</label>
                                                                             <input type="text" class="form-control" id="nama_supplier" placeholder="masukkan nama" name="nama_supplier" value="<?= $spl["nama_suplier"]; ?>">
                                                                         </div>
                                                                         <div class="mb-3">
                                                                             <label for="notelp_supplier" class="form-label">No.Telepon</label>
                                                                             <input type="number" class="form-control" id="notelp_supplier" placeholder="masukkan nomor telepon" name="notelp_supplier" value="<?= $spl["no_telp_suplier"]; ?>">
                                                                         </div>
                                                                         <div class="mb-3">
                                                                             <label for="alamat_supplier" class="form-label">Alamat Supplier</label>
                                                                             <input type="text" class="form-control" id="alamat_supplier" placeholder="masukkan Alamat Supplier" name="alamat_supplier" value="<?= $spl["alamat_suplier"]; ?>">
                                                                         </div>
                                                                         <div class="mb-3">
                                                                             <label for="keterangan_supplier" class="form-label">Keterangan</label>
                                                                             <input type="text" class="form-control" id="keterangan_supplier" placeholder="Keterangan" name="keterangan_supplier" value="<?= $spl["keterangan"]; ?>">
                                                                         </div>



                                                                 </div>
                                                                 <div class="modal-footer" name="tambahdata">
                                                                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                     <button type="submit" class="btn btn-primary" name="ubahdata" id="liveAlertBtn">Ubah Data</button>
                                                                 </div>
                                                                 </form>
                                                                 <!-- form -->
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <!-- akhir modal -->
                                                     <a href="../del/delspl.php?id_suplier= <?= $spl["id_suplier"]; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                         <button type="button" class="btn">
                                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                                 <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                                 <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                             </svg>

                                                         </button>
                                                     </a>
                                                 </td>
                                             </tr>


                                             <?php $i++; ?>
                                         <?php endforeach; ?>
                                     <?php endif; ?>
                                         </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         
     </main>





     <!--   Core JS Files   -->
     <script src="../dist/js/jquery-3.6.0.min.js"></script>
     <script src="../dist/js/script.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

     <script src="../assets/js/core/popper.min.js"></script>
     <script src="../assets/js/core/bootstrap.min.js"></script>
     <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
     <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
     <script src="../assets/js/plugins/chartjs.min.js"></script>
     <!-- <script>
         var ctx1 = document.getElementById("chart-line").getContext("2d");

         var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

         gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
         gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
         gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
         new Chart(ctx1, {
             type: "line",
             data: {
                 labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                 datasets: [{
                     label: "Mobile apps",
                     tension: 0.4,
                     borderWidth: 0,
                     pointRadius: 0,
                     borderColor: "#5e72e4",
                     backgroundColor: gradientStroke1,
                     borderWidth: 3,
                     fill: true,
                     data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                     maxBarThickness: 6

                 }],
             },
             options: {
                 responsive: true,
                 maintainAspectRatio: false,
                 plugins: {
                     legend: {
                         display: false,
                     }
                 },
                 interaction: {
                     intersect: false,
                     mode: 'index',
                 },
                 scales: {
                     y: {
                         grid: {
                             drawBorder: false,
                             display: true,
                             drawOnChartArea: true,
                             drawTicks: false,
                             borderDash: [5, 5]
                         },
                         ticks: {
                             display: true,
                             padding: 10,
                             color: '#fbfbfb',
                             font: {
                                 size: 11,
                                 family: "Open Sans",
                                 style: 'normal',
                                 lineHeight: 2
                             },
                         }
                     },
                     x: {
                         grid: {
                             drawBorder: false,
                             display: false,
                             drawOnChartArea: false,
                             drawTicks: false,
                             borderDash: [5, 5]
                         },
                         ticks: {
                             display: true,
                             color: '#ccc',
                             padding: 20,
                             font: {
                                 size: 11,
                                 family: "Open Sans",
                                 style: 'normal',
                                 lineHeight: 2
                             },
                         }
                     },
                 },
             },
         });
     </script> -->
     <script>
         var win = navigator.platform.indexOf('Win') > -1;
         if (win && document.querySelector('#sidenav-scrollbar')) {
             var options = {
                 damping: '0.5'
             }
             Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
         }
     </script>
     <!-- Github buttons -->
     <script async defer src="https://buttons.github.io/buttons.js"></script>
     <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
     <script src="../assets/js/argon-dashboard.min.js?v=2.0.0"></script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 </body>


 </html>