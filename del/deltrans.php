<?php

require '../function.php';


$kotrans = $_GET["kt"];

if (hapustransaksi($kotrans) > 0) {
    echo "
            <script>
            alert ('data berhasil dihapuskan !');
            document.location.href = '../admin/transaksi.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert ('data gagal dihapus !');
            document.location.href = '../admin/transaksi.php';
            </script>
        ";
}
