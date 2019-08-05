<?php
	include_once("include/main.php");?>
  <?php
  if(isset($_POST['sewa']))
  {
date_default_timezone_set('Asia/Jakarta');
	$tanggal = date("Y-m-d H:i:s");              // fungsi untuk membuat id Sewa
								$qu =mysqli_query($mysqli, "SELECT max(id_sewa) as maxKode FROM sewa");
								$data = mysqli_fetch_array($qu);
								$noOrder = $data['maxKode'];
								$noUrut = (int) substr($noOrder, 9, 3);
								$noUrut++;
								$char = "S";
								$tahun=substr($tanggal, 0, 4);
								$bulan=substr($tanggal, 5, 2);
								$id_Order = $char .$tahun .$bulan . sprintf("%04s", $noUrut);



//
	$id_pelanggan = $_POST['id_pelanggan'];
	$id_pengelola = $_POST['id_pengelola'];
	$id_lapangan = $_POST['id_lapangan'];
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$email = $_POST['email'];
  $nohp = $_POST['nohp'];
  $total = str_replace('.', '', $_POST['total']);
	$tanggal = date("Y-m-d H:i:s");
	$jam_mulai = $_POST['jam_mulai'];

	$jam_selesai = $_POST['jam_selesai'];

	$tanggal_main = $_POST['tgl_main'];

	$gabungA = $tanggal_main." ".$jam_mulai;
	$gabungB = $tanggal_main." ".$jam_selesai;
	$lama_sewa = str_replace('jam', '', $_POST['lama_sewa']);





	$query = mysqli_query($mysqli, "SELECT * FROM sewa WHERE id_lapangan ='$id_lapangan' AND ((jam_mulai <= '$gabungA' AND jam_selesai >'$gabungA')
  OR
  (jam_mulai < jam_selesai AND jam_selesai >= @EndDate))")
										or die('Ada kesalahan pada query user: '.mysqli_error($mysqli));
		$rows  = mysqli_num_rows($query);

		// jika data ada, jalankan perintah untuk membuat session
		if ($rows > 0) {
		header("Location: lapangan.php?alert=1");// lalu alihkan ke halaman user
		}
		else
		{

$data  = mysqli_fetch_assoc($query);

			$insert="INSERT INTO `sewa`(`id_sewa`,`id_lapangan`,`tgl_pesan`,`jam_mulai`,`jam_selesai`,`lama_sewa`,`total`,`status`,`id_pelanggan`,`id_pengelola`) VALUES('$id_Order','$id_lapangan','$tanggal','$gabungA','$gabungB','$lama_sewa','$total','Menunggu Pembayaran','$id_pelanggan','$id_pengelola')";
			$query=mysqli_query($mysqli,$insert) or die(mysqli_error($mysqli));
			if($query==1)
			{
			$ins="INSERT INTO `pelanggan`(`id_pelanggan`,`nama_pelanggan`,`email`,`nohp`,`id_sewa`) VALUES('$id_pelanggan','$nama_pelanggan','$email','$nohp','$id_Order')";
			$quy=mysqli_query($mysqli,$ins) or die(mysqli_error($mysqli));
			if($quy==1)
			{
				// lalu alihkan ke halaman user

				header("Location: cetak_invoice.php?id_sewa='$id_Order'");
			}
			}
			else
			{
			echo "Payment no done:";
			}

		}
	}
?>
