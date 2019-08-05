<?php
include 'koneksi.php';
// end membuat koneksi
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
    if($ukuran > 104407000){
	move_uploaded_file($file_tmp, '../..images/lapangan/'.$foto);
	$query = mysqli_query($koneksi,"INSERT INTO lapangan VALUES('$id','$nama','$harga','$foto')");
	var_dump($query);
	if($query){
		echo 'FILE BERHASIL DI UPLOAD';
	}else{
		echo 'GAGAL MENGUPLOAD GAMBAR';
	}
     }else{
	echo 'UKURAN FILE TERLALU BESAR';
     }
}else{
    echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
}
header("location:lapangan.php");
?>
