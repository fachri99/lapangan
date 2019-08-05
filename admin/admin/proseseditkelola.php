<?php
include 'koneksi.php';
// end membuat koneksi
$id_pengelola  		    = $_GET['id_pengelola'];
$nama_pengelola     	= $_GET['nama_pengelola'];
$username   			= $_GET['username'];
$password  				= $_GET['password'];
$email  				= $_GET['emailpengelola'];
$nohp				= $_GET['nohppengelola'];
$alamat  				= $_GET['alamat'];

mysqli_query($koneksi,"UPDATE pengelola set nama_pengelola='$nama_pengelola', username='$username', password='$password', emailpengelola ='$email', nohppengelola='$nohp', alamat='$alamat' where id_pengelola='$id_pengelola'");
// var_dump($query);

header("location:pengelola.php");
?>
