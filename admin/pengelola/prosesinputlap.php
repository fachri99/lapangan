<?php
session_start();
include 'koneksi.php';
// end membuat koneksi

$id_pengelola = $_SESSION['id_pengelola'];
$id         = $_POST['id_lapangan'];
$nama       = $_POST['nama_lapangan'];
$harga      = $_POST['harga_lapangan'];
$hargaa      = $_POST['harga_lapangana'];
$ekstensi_diperbolehkan	= array('png','jpg');
$foto         = $_FILES['foto']['name'];
$x          = explode('.', $foto);
$ekstensi   = strtolower(end($x));
$ukuran	    = $_FILES['foto']['size'];
$file_tmp   = $_FILES['foto']['tmp_name'];

// proses validasi
if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
    if($ukuran < 3000000){
	move_uploaded_file($file_tmp, '../../images/lapangan/'.$foto);
	$query = mysqli_query($koneksi,"INSERT INTO lapangan VALUES('$id','$nama','$harga','$hargaa','$foto','$id_pengelola')");
	var_dump($query);
	if($query){
		header("Location: lapangan.php?alert=5");
	}else{
		header("Location: lapangan.php?alert=3");
	}
     }else{
	header("Location: lapangan.php?alert=1");
     }
}else{
    header("Location: lapangan.php?alert=2");
}

?>
