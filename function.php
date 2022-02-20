<?php



// mengaktifkan session pada php
session_start();

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "sibangun");



function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function login($log)
{
    global $conn;

    //  menangkap data yang dikirim dari form login
    $username = $log['username'];
    $password = $log['password'];

    // menyeleksi data user dengan username dan password yang sesuai
    $login = mysqli_query($conn, "SELECT *FROM user WHERE username = '$username' AND password = '$password'");
    // menghitung jumlah data yang ditemukan pada database
    $cek = mysqli_num_rows($login);

    // cek apakah username dan password ditemukan pada database
    if ($cek > 0) {

        $data = mysqli_fetch_assoc($login);

        // cek jika user login sebagai admin
        if ($data['level'] == 'admin') {


            // buat session login dan username


            $_SESSION['username'] = $username;
            $_SESSION['level'] = 'admin';




            // alihkan ke halaman dashboard admin
            header("Location:admin/dashboard.php");



            // cek jika user login sebagai pegawai
        } elseif ($data['level'] == 'pegawai') {

            // buat session login dan username

            $_SESSION['username'] = $username;
            $_SESSION['level'] = 'pegawai';

            // alihkan ke halaman dashboard pegawai
            header("Location:pegawai");
        } else {
            // alihkan ke halaman login kembali
            header("Location:index.php?pesan=gagal");
        }
    } else {
        header("Location:index.php?pesan=gagal");
    }
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM suplier WHERE id_suplier = $id");

    return mysqli_affected_rows($conn);
}

function hapusbarangmasuk($i)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM barang_masuk WHERE kode_barang_masuk = $i");



    return mysqli_affected_rows($conn);
}

function hapusbarang($d)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM barang WHERE kode_barang = $d");



    return mysqli_affected_rows($conn);
}

function hapusbarangkeluar($bk)
{

    global $conn;
    mysqli_query($conn, "DELETE FROM penjualan WHERE id_penjualan  = $bk");



    return mysqli_affected_rows($conn);
}

function hapustransaksi($kotrans)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi  = $kotrans");


    return mysqli_affected_rows($conn);
}

function tambah($data)
{


    global $conn;

    $nama = ($data["nama_supplier"]);
    $telepon = ($data["notelp_supplier"]);
    $alamat = ($data["alamat_supplier"]);
    $keterangan = ($data["keterangan_supplier"]);

    // query insert data
    $query = "INSERT INTO suplier VALUES ('','$nama','$alamat','$telepon','$keterangan')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahbarangmasuk($data)
{
    global $conn;
    $tanggal = ($data["tglmsk"]);
    $namabarang = ($data["nmbrgmsk"]);
    $hargabeli = ($data["hrgbeli"]);
    $satuanbarang = ($data["stnbrg"]);
    $jumlahmasuk = ($data["jmlhmskbrg"]);
    $suplier = ($data["nmspl"]);
    $user = ($data["nmusr"]);
    $stat = ($data["status"]);



    // insert barang masuk

    $query = "INSERT INTO barang_masuk VALUES(
            '',
            '$tanggal',
            '$namabarang',
            '$hargabeli',
            '$satuanbarang',
            '$jumlahmasuk',
            '$suplier',
            '$user',
            '$stat'
    )";



    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $id = ($data['id_suplier']);
    $nama = ($data["nama_supplier"]);
    $telepon = ($data["notelp_supplier"]);
    $alamat = ($data["alamat_supplier"]);
    $keterangan = ($data["keterangan_supplier"]);

    // query ubah data
    $query = "UPDATE suplier SET
                nama_suplier = '$nama',
                  alamat_suplier = '$alamat',
                no_telp_suplier = '$telepon',
                keterangan = '$keterangan'
                WHERE id_suplier = $id
             ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// ubah data barang masuk
function ubahbrg($data)
{
    global $conn;
    $kdbarangmasuk = ($data['kdbrgmsk']);
    $tanggalmasuk = date("Y-m-d");
    $namabarang = ($data["nmbrg"]);
    $jenisbarang = ($data["jnsbrg"]);
    $hargabeli = ($data["hrgbli"]);
    $satuanbarang = ($data["stnbrg"]);
    $jumlahmasuk = ($data["jmlmsk"]);
    $suplier = ($data["nmspl"]);
    $user = ($data["nmusr"]);




    // query ubah data
    $query = "UPDATE barang_masuk SET
                tanggal_masuk = '$tanggalmasuk',
                  nama_barang = '$namabarang',
                jenis_barang = '$jenisbarang',
                harga_beli = '$hargabeli',
                 satuan_barang = '$satuanbarang',
                   jumlah_masuk = '$jumlahmasuk',
                    id_suplier = '$suplier',
                     id_user = '$user'
                WHERE kode_barang_masuk = $kdbarangmasuk
             ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// ubah data barang
function ubahbarang($data)
{
    global $conn;
    $kodebarang = ($data['kb']);
    $hargajual = ($data["hj"]);
    $stokbarang = ($data["sb"]);


    // query ubah data barang
    $query = "UPDATE barang  SET
                    harga_jual = '$hargajual',
                     stok_barang = '$stokbarang'
                WHERE kode_barang = $kodebarang
             ";



    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{

    global $conn;

    $query = "SELECT * FROM suplier
                WHERE
                nama_suplier LIKE '%$keyword%' OR
                 alamat_suplier LIKE '%$keyword%' OR
                  no_telp_suplier LIKE '%$keyword%' OR
                   keterangan LIKE '%$keyword%'
                   

               
    
    ";


    return mysqli_query($conn, $query);
}

function caribarang($keyword)
{
    global $conn;


    $query = "SELECT * FROM barang JOIN barang_masuk ON barang.kode_barang_masuk = barang_masuk.kode_barang_masuk JOIN suplier ON barang_masuk.id_suplier = suplier.id_suplier
                WHERE
                kode_barang LIKE '%$keyword%' OR
                 nama_barang LIKE '%$keyword%' OR
                  keterangan LIKE '%$keyword%' OR
                   satuan_barang LIKE '%$keyword%' OR
                    harga_beli LIKE '%$keyword%' OR
                    harga_jual LIKE '%$keyword%' OR
                     stok_barang LIKE '%$keyword%'
                    
                   
   
             
    
    ";



    return mysqli_query($conn, $query);
}

function caribarangmsk($keyword)
{
    global $conn;

    $query = "SELECT * FROM barang_masuk JOIN user ON barang_masuk.id_user = user.id_user JOIN suplier ON barang_masuk.id_suplier = suplier.id_suplier
            WHERE
            kode_barang_masuk LIKE '%$keyword%' OR
                 tanggal_masuk LIKE '%$keyword%' OR
                  nama_barang LIKE '%$keyword%' OR
                   keterangan LIKE '%$keyword%' OR
                    harga_beli LIKE '%$keyword%' OR
                    satuan_barang LIKE '%$keyword%' OR
                     jumlah_masuk LIKE '%$keyword%' OR
                      nama_suplier LIKE '%$keyword%' OR
                       username LIKE '%$keyword%' OR
                        status_barang_masuk LIKE '%$keyword%'



    ";



    return mysqli_query($conn, $query);
}



function tambahstokbarang($data)
{
    global $conn;


    $ambiljumlahmasuk = mysqli_query($conn, "SELECT jumlah_masuk from barang_masuk where kode_barang_masuk = '$data'");
    $ambilstokbarang = mysqli_query($conn, "SELECT stok_barang FROM barang WHERE kode_barang_masuk = '$data'");

    $jumlahmasuk = mysqli_fetch_assoc($ambiljumlahmasuk);
    $stokbarang = mysqli_fetch_array($ambilstokbarang);





    if (!$stokbarang == NULL) {
        $jumlahmasuk1 = $jumlahmasuk['jumlah_masuk'];
        $stokbarang1 = $stokbarang['stok_barang'];

        $hasil = $jumlahmasuk1 + $stokbarang1;
        // query tambah stok 
        $query = "UPDATE barang SET
                stok_barang = '$hasil'
                WHERE kode_barang_masuk = '$data'
             ";

        // ubah barang masuk menjadi ACC 
        $querystat = "UPDATE barang_masuk SET
                status_barang_masuk = 'ACC'
                WHERE kode_barang_masuk = '$data'
             ";
    } else {




        // keluarkan data dari tabel barang_masuk
        $query1 = mysqli_query($conn, "SELECT jumlah_masuk FROM barang_masuk WHERE kode_barang_masuk = '$data'");

        $data1 = mysqli_fetch_assoc($query1);
        $jumlah_masuk = $data1['jumlah_masuk'];







        // query barang_masuk ke tabel barang



        $query = "INSERT INTO barang VALUES(
            '',
            '$data',
            'NULL',
            '$jumlah_masuk'
    )";

        // ubah barang masuk menjadi ACC 
        $querystat = "UPDATE barang_masuk SET
                status_barang_masuk = 'ACC'
                WHERE kode_barang_masuk = '$data'
             ";
    }



    mysqli_query($conn, $query);
    mysqli_query($conn, $querystat);



    return mysqli_affected_rows($conn);
}

function pilihbarang($data)
{
    global $conn;

    $kodebarang = ($data['hidden_id']);
    $jumlahBarang = ($data['quantity']);
    $hargajual = ($data['hidden_price']);
    $total_harga = $hargajual *  $jumlahBarang;



    $query = "INSERT INTO penjualan (kode_barang, jumlah_beli, total_harga) VALUE ('$kodebarang','$jumlahBarang','$total_harga') ";

    mysqli_query($conn, $query);




    return mysqli_affected_rows($conn);
}

function formbeli($data)
{



    global $conn;

    $namaPembeli = ($data['nmpembeli']);
    $uangDibayar = ($data['ungdibyr']);
    $jenisPembayaran = ($data['jenisbayar']);
    $keterangan = ($data['ket']);
    $user = ($data['nmusr']);
    $tgl = date('Y-m-d');
    $kodetransaksi = date('Ymd');

    // mencari uang kembalian

    if (isset($_COOKIE["shopping_cart"])) {
        $total = 0;
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cookie_data, true);
        foreach ($cart_data as $keys => $values) {

            $total = $total + ($values["item_quantity"] * $values["item_price"]);
        }
        $subTotal = number_format($total, 2);
        $uangdibayar = number_format($uangDibayar, 2);
    }
   
    $uangkembalian = $uangDibayar - $total;
    
    
  

   










    $query = "INSERT INTO transaksi VALUE (
                '',
                '$kodetransaksi',
                '$tgl',
                '$namaPembeli',
                '$total',
                '$uangkembalian',
                '$jenisPembayaran',
                '$keterangan',
                '$user'
    ) ";

    // hapus data barang keluar
    // $sql = "DELETE FROM barang_keluar;";

    mysqli_query($conn, $query);

    // mysqli_query($conn, $sql);




    return mysqli_affected_rows($conn);
}
