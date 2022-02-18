<?php

require '../function.php';


$bk = $_GET["delbelanja"];

if (hapusbarangkeluar($bk) > 0) {
    echo "
            <script>
            alert ('data berhasil dihapuskan !');
            document.location.href = '../admin/transaksipenjualan.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert ('data gagal dihapus !');
            document.location.href = '../admin/transaksipenjualan.php';
            </script>
        ";
}
