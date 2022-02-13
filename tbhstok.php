<?php
require 'function.php';

$kdbrg = $_GET["tmbbrg"];



if (tambahstokbarang($kdbrg) > 0 ) {

    echo "
<script>
    alert('data stok berhasil ditambahkan ke barang !');
   document.location.href = 'admin/barangmasuk.php'; 
</script>
";
} else {
    echo "
<script>
    alert('data stok gagal ditambahkan !');
    document.location.href = 'admin/barangmasuk.php';
</script>
";
}
