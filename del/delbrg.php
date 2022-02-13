<?php

require '../function.php';


$kdbr = $_GET["kdbrg"];

if (hapusbarang($kdbr) > 0) {
    echo "
            <script>
            alert ('data berhasil dihapuskan !');
            document.location.href = '../admin/barang.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert ('data gagal dihapus !');
            document.location.href = '../admin/barang.php';
            </script>
        ";
}
