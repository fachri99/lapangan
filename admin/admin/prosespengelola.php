<?php
include 'koneksi.php';
// end membuat koneksi
$id         = $_POST['id'];

$username   = $_POST['username'];
$password   = $_POST['password'];
$nama       = $_POST['nama_pengelola'];
$nohp       = $_POST['nohppengelola'];
$email       = $_POST['emailpengelola'];
$alamat       = $_POST['alamat'];
mysqli_query($koneksi,"INSERT INTO pengelola value ('$id','$username','$password','$nama','$nohp','$email','$alamat')");

header("location:pengelola.php");
?>
