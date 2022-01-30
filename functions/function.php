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

    $namalengkap = htmlspecialchars(stripcslashes($data["namalengkap"]));
    $alamat = htmlspecialchars($data["alamat"]);
    $noTelepon = htmlspecialchars(preg_replace("/[^0-9]/","",$data["notelp"]));
    $tempatlahir = htmlspecialchars($data["tmplahir"]);
    $tglLahir = htmlspecialchars("$data[tgllahir]");
    $username = htmlspecialchars(strtolower(stripcslashes($data["username"])));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
   
}


?>
