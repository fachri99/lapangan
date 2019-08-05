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

$tes ="DELETE sewa, pelanggan FROM sewa INNER JOIN pelanggan ON pelanggan.id_pelanggan = sewa.id_pelanggan
 WHERE tgl_pesan < DATE_SUB(NOW(), INTERVAL 3 HOUR)
   AND status = 'Menunggu Pembayaran'";

$hasill = mysqli_query($mysqli,$tes);
 ?>
