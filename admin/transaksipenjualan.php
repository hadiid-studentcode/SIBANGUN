 <?php
    require '../function.php';

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] == "") {
        header("location:../index.php");
    }

    $data = mysqli_query($conn, "SELECT * FROM barang_keluar JOIN barang ON barang_keluar.kode_barang = barang.kode_barang JOIN barang_masuk ON barang.kode_barang_masuk = barang_masuk.kode_barang_masuk");






    if (isset($_POST['pilih'])) {

        if (pilihbarang($_POST) > 0) {
            echo "
            <script>
            alert ('data berhasil ditambahkan !');
            document.location.href = 'transaksipenjualan.php';
            </script>
        ";
        } else {
            echo "
            <script>
            alert ('data gagal ditambahkan !');
            document.location.href = 'transaksipenjualan.php';
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
                         <li class="breadcrumb-item text-sm text-white active" aria-current="page">Transaksi Penjualan</li>
                         <li class="breadcrumb-item text-sm text-white active" aria-current="page">Lakukan Transaksi </li>
                     </ol>
                     <h6 class="font-weight-bolder text-white mb-0">Lakukan Transaksi Penjualan</h6>
                 </nav>
                 <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                     <div class="ms-md-auto pe-md-3 d-flex align-items-center">

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
                     <h6>Keranjang Belanjaan</h6>
                     <div class="col-12 text-end">
                         <a class="btn bg-gradient-primary mb-0" data-bs-toggle="modal" data-bs-target="#pilihbarang"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                 <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                             </svg>&nbsp;&nbsp;Pilih Barang</a>
                         <!-- Modal pilih barang -->
                         <div class="modal fade" id="pilihbarang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                 <form action="" method="POST">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="staticBackdropLabel">Pilih Barang</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">
                                             <div class="form-floating">
                                                 <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="pilihbrg">
                                                     <option selected>Pilih Barang Bangunan</option>
                                                     <?php $barang = mysqli_query($conn, "SELECT * FROM barang JOIN barang_masuk ON barang.kode_barang_masuk = barang_masuk.kode_barang_masuk JOIN suplier ON barang_masuk.id_suplier = suplier.id_suplier"); ?>

                                                     <?php while ($brg = mysqli_fetch_array($barang)) : ?>

                                                         <option value=<?= $brg["kode_barang"]; ?>><?= $brg["nama_barang"]; ?> ( <?= $brg["satuan_barang"]; ?> ) ( <?= $brg["harga_jual"]; ?> ) </option>
                                                     <?php endwhile; ?>

                                                 </select>

                                                 <label for="floatingSelect">Pilih Barang</label>
                                             </div>
                                             <br>
                                             <div class="form-floating">
                                                 <input type="number" class="form-control" id="jumlahbeli" aria-describedby="emailHelp" name="jumlahbeli">

                                                 <label for="floatingSelect">Jumlah Beli</label>
                                             </div>

                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                             <button type="submit" class="btn btn-primary" name="pilih">Pilih Barang</button>
                                         </div>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="card-body px-0 pt-0 pb-2">
                     <div class="table-responsive p-0">
                         <table class="table align-items-center mb-0">
                             <thead>
                                 <tr>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Barang</th>
                                     <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Satuan</th>
                                     <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah beli</th>
                                     <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>

                                 </tr>

                             </thead>
                             <?php $i = 1; ?>
                             <?php while ($barangkeluar = mysqli_fetch_assoc($data)) :  ?>
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
                                             <p class="text-xs font-weight-bold mb-0"><?= $barangkeluar['nama_barang']; ?></p>

                                         </td>
                                         <td class="align-middle text-center text-sm">
                                             <span class="text-secondary text-xs font-weight-bold">RP.<?= $barangkeluar['harga_jual']; ?></span>
                                         </td>
                                         <td class="align-middle text-center">
                                             <span class="text-secondary text-xs font-weight-bold"><?= $barangkeluar['jumlah_beli']; ?></span>
                                         </td>
                                         <td class="align-middle text-center">
                                             <span class="text-secondary text-xs font-weight-bold">RP.<?= $barangkeluar['total']; ?></span>
                                         </td>



                                         <td class="align-middle">


                                             <a href="../del/delkrjblnj.php?delbelanja=<?= $barangkeluar['id_barangkeluar']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                 <button type="button" class="btn">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                         <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                         <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                     </svg>

                                                 </button>
                                             </a>
                                         </td>
                                     </tr>
                                     <?php $i++ ?>
                                 <?php endwhile; ?>

                                 <?php $sql = mysqli_query($conn, "SELECT sum(total) as subtotal from barang_keluar;");
                                    $subtotal = mysqli_fetch_array($sql); ?>
                                 <tr>
                                     <td colspan="4" class="align-middle text-center">
                                         <span class="text-secondary text-xs font-weight-bold">SUB TOTAL</span>
                                     </td>
                                     <td colspan="" class="align-middle text-start"> <span class="text-secondary text-xs font-weight-bold">RP.<?= $subtotal['subtotal']; ?></span></td>
                                 </tr>




                                 </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>

         <!-- form pembeli -->
         <div class="col-9 container">
             <div class="card mb-4">
                 <div class="card-header pb-0">
                     <h6>From Pembelian</h6>
                     <div class="col-12 text-end">
                         <a class="btn bg-gradient-success mb-0" href="transaksipenjualan.php"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save2" viewBox="0 0 16 16">
                                 <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v4.5h2a.5.5 0 0 1 .354.854l-2.5 2.5a.5.5 0 0 1-.708 0l-2.5-2.5A.5.5 0 0 1 5.5 6.5h2V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
                             </svg>&nbsp;&nbsp;Simpan</a>
                     </div>
                 </div>
                 <div class="card-body px-0 pt-0 pb-2">
                     <div class="table-responsive p-0">
                         <!-- table -->

                         <form action="" method="POST" class="container">
                             <div class="mb-3">
                                 <label for="nmpembeli" class="form-label">Nama Pembeli</label>
                                 <input type="text" class="form-control" id="nmpembeli" name="nmpembeli" placeholder="Nama Pembeli">
                             </div>

                             <div class="mb-3">
                                 <label for="ungdibyr" class="form-label">Uang Dibayar</label>

                                 <div class="input-group mb-3">
                                     <span class="input-group-text" id="ungdibyr">RP</span>
                                     <input type="number" class="form-control" placeholder="Uang Dibayar" aria-label="ungdibyr" aria-describedby="ungdibyr" name="ungdibyr" id="ungdibyr">
                                 </div>
                             </div>

                             <div class="mb-3">
                                 <label for="ungkembalian" class="form-label">Uang Kembalian</label>

                                 <div class="input-group mb-3">
                                     <span class="input-group-text" id="ungkembalian">RP</span>
                                     <input type="number" class="form-control" placeholder="Uang Kembalian" aria-label="ungkembalian" aria-describedby="ungkembalian" name="ungkembalian" id="ungkembalian" disabled>
                                 </div>
                             </div>
                             <div class="mb-3">
                                 <select class="form-select" aria-label="Default select example">
                                     <option selected>Jenis Pembayaran</option>
                                     <option value="Tunai">Tunai</option>
                                     <option value="Transfer">Transfer</option>
                                     <option value="Hutang">Hutang</option>
                                 </select>
                             </div>


                         </form>

                         <!-- akhir -->
                     </div>
                 </div>
             </div>
         </div>
         <!-- akhir form pembeli -->
     </main>

     <!-- scirpt dari saya js -->
     <script src="../dist/js/script.js"></script>



     <!--   Core JS Files   -->
     <script src="../assets/js/core/popper.min.js"></script>
     <script src="../assets/js/core/bootstrap.min.js"></script>
     <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
     <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
     <script src="../assets/js/plugins/chartjs.min.js"></script>
     <script>
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
     </script>
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
 </body>

 </html>