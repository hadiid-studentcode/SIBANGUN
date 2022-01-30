<?php

// koneksi ke database
$conn= mysqli_connect("localhost", "root", "", "sibangun");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;

}

function registrasi($data){
    global $conn;

    $namalengkap = stripcslashes($data["namalengkap"]);
    $alamat = $data["alamat"];
    $noTelepon = preg_replace("/[^0-9]/","",$data["notelp"]);
   
}


?>

<!-- nama lengkap = namalengkap
alamat = alamat
no telepon = notelp
tempat lahir = tmplahir
tanggal lahir = tgllahir
username = username
password = password
verifikasi passowrd = password2 -->