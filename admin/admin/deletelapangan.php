<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$id   = $_GET['id_lapangan'];
// query SQL untuk insert data
$query="DELETE from lapangan where id_lapangan='$id'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:lapangan.php");
?>
