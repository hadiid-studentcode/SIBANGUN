<?php

require '../function.php';


$id = $_GET["id_suplier"];

if ( hapus($id) > 0 ) {
    echo "
            <script>
            alert ('data berhasil dihapuskan !');
            document.location.href = '../admin/suplier.php';
             
            </script>
        ";
} else {
    echo "
            <script>
            alert ('data gagal dihapus !');
            document.location.href = '../admin/suplier.php';
            </script>
        ";
}



?>