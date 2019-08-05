<?php
session_start();
include 'koneksi.php';
// end membuat koneksi
$id_pengelola = $_SESSION['id_pengelola'];
$id         = $_POST['id_lapangan'];
$nama       = $_POST['nama_lapangan'];
$harga      = $_POST['harga_lapangan'];
$hargaa     = $_POST['harga_lapangana'];
$ekstensi_diperbolehkan	= array('png','jpg');
$foto         = $_FILES['foto']['name'];
$x          = explode('.', $foto);
$ekstensi   = strtolower(end($x));
$ukuran	    = $_FILES['foto']['size'];
$max				= 20000;
$file_tmp   = $_FILES['foto']['tmp_name'];



if($_POST){ //jika tombol update ditekan dan data terkirim ke server
	//bentuk sql query untuk update
	if (empty($foto)) {
	                    // perintah query untuk mengubah data pada tabel portfolio
	                    $query = mysqli_query($koneksi, "UPDATE lapangan set nama_lapangan='$nama', harga_lapangan='$harga',harga_lapangana='$hargaa', id_pengelola='$id_pengelola' where id_lapangan='$id'")
	                                                    or die('Ada kesalahan pada query update : '.mysqli_error($koneksi));
											if ($query) {
												header("location:lapangan.php");
												}

												}
												else{


												if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
													if($ukuran < 1000000){
													move_uploaded_file($file_tmp, '../../images/lapangan/'.$foto);
													$query = mysqli_query($koneksi,"UPDATE lapangan set nama_lapangan='$nama', harga_lapangan='$harga',harga_lapangana='$hargaa', foto='$foto', id_pengelola='$id_pengelola' where id_lapangan='$id'");
													var_dump($query);
													if($query){
														header("Location: lapangan.php?alert=4");
													}else{
														header("Location: lapangan.php?alert=3");
													}
												     }else{
													header("Location: lapangan.php?alert=1");
												     }
												}else{
												    header("Location: lapangan.php?alert=2");
												}

											}
										}
?>
