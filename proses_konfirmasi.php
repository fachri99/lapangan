<?php
	include_once("include/main.php");?>
  <?php

  if(isset($_POST['sewa']))
  {

date_default_timezone_set('Asia/Jakarta');
	$tanggal = date("Y-m-d H:i:s");              // fungsi untuk membuat id Sewa
								$qu =mysqli_query($mysqli, "SELECT max(id_konfirmasi) as maxKode FROM konfirmasi");
								$data = mysqli_fetch_array($qu);
								$noOrder = $data['maxKode'];
								$noUrut = (int) substr($noOrder, 9, 3);
								$noUrut++;
								$char = "K";
								$tahun=substr($tanggal, 0, 4);
								$bulan=substr($tanggal, 5, 2);
								$id_konfirmasi = $char .$tahun .$bulan . sprintf("%04s", $noUrut);

  $id_sewa = $_POST['id_sewa'];
	$id_pengelola = $_POST['id_pengelola'];
  $emailpengelola = $_POST['emailpengelola'];
  $ekstensi_diperbolehkan	= array('png','jpg');
  $foto         = $_FILES['foto']['name'];
  $x          = explode('.', $foto);
  $ekstensi   = strtolower(end($x));
  $ukuran	    = $_FILES['foto']['size'];
  $file_tmp   = $_FILES['foto']['tmp_name'];

  // proses validasi
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 104407000){
  	move_uploaded_file($file_tmp, 'images/bukti/'.$foto);
  	$query = mysqli_query($mysqli,"INSERT INTO konfirmasi VALUES('$id_konfirmasi','$id_sewa','$id_pengelola','$foto','$tanggal')");

  	if($query){
  		$query = mysqli_query($mysqli,"UPDATE sewa SET status ='Sudah Konfirmasi'WHERE id_sewa='$id_sewa'");


			 require 'plugins/phpmailer/PHPMailerAutoload.php';


			$mail = new PHPMailer();

			$mail->isSMTP();
			$mail->Port = 465;
			$mail->SMTPSecure = false;

			$mail->Host     = "ssl://smtp.gmail.com";
			$mail->Mailer   = "smtp";
			$mail->SMTPAuth = true;

			 $mail->Username = "ahmadfachri96@gmail.com";
			 $mail->Password = "facebook.co";
			 $webmaster_email = "ahmadfachri96@gmail.com";
			 $email = $emailpengelola;
			 $name = $id_sewa;
			 $mail->From= $webmaster_email;
			 $mail->FromName="Admin Flank";
			 $mail->AddAddress($emailpengelola, $name);

			 $mail->AddReplyTo($webmaster_email, "Admin Flank");
			 $mail->WordWrap = 50;

			 $mail->IsHTML(true);
			 $mail->Subject = "Konfirmasi $id_sewa";
			 $mail->Body ="Pelanggan dengan $id_sewa telah melakukan konfirmasi pembayaran, HARAP CEK HALAMAN KONFIRMASI";



			 $mail->AltBody = "YOOO E-Mail Gw UDAH SIAP BRO";
			 if(!$mail->Send()) {
			  echo "mail error" . $mail->ErrorInfo;
			 } else {
			  header("Location: index.php");
			 }


  	}else{
  		echo 'GAGAL MENGUPLOAD GAMBAR';
  	}
       }else{
  	header("Location: konfirmasi.php?alert=2");// lalu alihkan ke halaman user
       }
  }else{
      header("Location: konfirmasi.php?alert=1");// lalu alihkan ke halaman user
  }
}
?>
