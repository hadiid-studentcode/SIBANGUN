<?php

require '../function.php';


$kd = $_GET["kdbrgmsk"];

if (hapusbarangmasuk($kd) > 0 ) {
    echo "
            <script>
            alert ('data berhasil dihapuskan !');
            document.location.href = '../admin/barangmasuk.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert ('data gagal dihapus !');
            document.location.href = '../admin/barangmasuk.php';
            </script>
        ";
}
