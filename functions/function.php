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
    $email = htmlspecialchars($data["email"]);
    $noTelepon = htmlspecialchars(preg_replace("/[^0-9]/","",$data["notelp"]));
    $tempatlahir = htmlspecialchars($data["tmplahir"]);
    $tglLahir = htmlspecialchars("$data[tgllahir]");
    $username = htmlspecialchars(strtolower(stripcslashes($data["username"])));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
   
    // cek username sudah ada atau belum
    $result = mysqli_query($conn,"SELECT username FROM pegawai_gudang WHERE username = '$username'");
    
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar');
                </script>";
                return false;
    }

    // cek konfirmasi password

    if ($password != $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
                </scirpt>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);



    // tambahkan user pegawai baru ke database
    $test =  mysqli_query($conn, "INSERT INTO pegawai_gudang VALUES('', '$namalengkap','$alamat','$noTelepon', '$tempatlahir', '$tglLahir', '$email', '$username', '$password')");
     
    
    

    return mysqli_affected_rows($conn);

}


?>
