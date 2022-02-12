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
    $jenisbarang = ($data["jnsbrgmsk"]);
    $hargabeli = ($data["hrgbeli"]);
    $satuanbarang = ($data["stnbrg"]);
    $jumlahmasuk = ($data["jmlhmskbrg"]);
    $suplier = ($data["nmspl"]);
    $user = ($data["nmusr"]);



    // insert barang masuk

    $query = "INSERT INTO barang_masuk VALUES(
            '',
            '$tanggal',
            '$namabarang',
            '$jenisbarang',
            '$hargabeli',
            '$satuanbarang',
            '$jumlahmasuk',
            '$suplier',
            '$user'
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
