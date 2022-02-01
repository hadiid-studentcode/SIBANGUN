<?php

// mengaktifkan session pada php
session_start();

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

 function login ($log){
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
        } elseif($data['level'] == 'pegawai') {
            
            // buat session login dan username

            $_SESSION['username'] = $username;
            $_SESSION['level'] = 'pegawai';

            // alihkan ke halaman dashboard pegawai
            header("Location:pegawai");
           
        }else{
            // alihkan ke halaman login kembali
            header("Location:index.php?pesan=gagal");
        }
    } else {
        header("Location:index.php?pesan=gagal");
    }
 }


?>



















