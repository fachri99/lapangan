<?php
include 'koneksi.php';
// end membuat koneksi
$id         	= $_GET['id_sewa'];
$nama_lap       = $_GET['nama_lap'];
$tanggal_sewa   = $_GET['tanggal_sewa'];
$jam_mulai      = $_GET['jam_mulai'];
$jam_selesai    = $_GET['jam_selesai'];
$total      		= $_GET['total'];
$status			= $_GET['status'];

// proses validasi
$query="UPDATE sewa set status='$status' where id_sewa='$id'";
// echo $query;
mysqli_query($koneksi,$query);

header("location:penyewaan.php");
?>
