<?php
// deklarasi parameter koneksi database
$server   = "localhost";
$username = "root";
$password = "";
$database = "futsaljakarta";

// koneksi database
$mysqli = new mysqli($server, $username, $password, $database);

// cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}
?>


<?php
date_default_timezone_set('Asia/Jakarta');

$tes ="DELETE FROM sewa
 WHERE tgl_pesan < DATE_SUB(NOW(), INTERVAL 1 HOUR)
   AND status = ''";
$hasill = mysqli_query($mysqli,$tes);
 ?>
