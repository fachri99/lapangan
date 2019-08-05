<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$id   = $_GET['id_pengelola'];
// query SQL untuk insert data
$query="DELETE pengelola, lapangan, konfirmasi from pengelola
                                    INNER JOIN lapangan ON lapangan.id_pengelola = pengelola.id_pengelola
                                    INNER JOIN konfirmasi ON lapangan.id_pengelola = konfirmasi.id_pengelola
                                    where pengelola.id_pengelola='$id'";


mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:pengelola.php");
?>
