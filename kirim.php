<?php
	include_once("include/main.php");?>
  <?php

  if(isset($_POST['sewa']))
  {

  $id_sewa = $_POST['id_sewa'];
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
  	$query = mysqli_query($mysqli,"INSERT INTO konfirmasi VALUES('isisisi','$id_sewa','$foto')");

  	if($query){
//  		$query = mysqli_query($mysqli,"UPDATE sewa SET status ='Sudah Konfirmasi'WHERE id_sewa='$id_sewa'");

		echo 'aaa';
			//  require 'plugins/phpmailer/PHPMailerAutoload.php';
      //
      //
			// $mail = new PHPMailer();
      //
			// $mail->isSMTP();
			// $mail->Port = 465;
			// $mail->SMTPSecure = false;
      //
			// $mail->Host     = "ssl://smtp.gmail.com";
			// $mail->Mailer   = "smtp";
			// $mail->SMTPAuth = true;
      //
			//  $mail->Username = "ahmadfachri96@gmail.com";
			//  $mail->Password = "facebook.co";
			//  $webmaster_email = "ahmadfachri96@gmail.com";
			//  $email = $emailpengelola;
			//  $name = $id_sewa;
			//  $mail->From= $webmaster_email;
			//  $mail->FromName="Kemal Pahlevi";
			//  $mail->AddAddress($emailpengelola, $name);
      //
			//  $mail->AddReplyTo($webmaster_email, "Nama Pengirim");
			//  $mail->WordWrap = 50;
      //
			//  $mail->IsHTML(true);
			//  $mail->Subject = $id_sewa;
			//  $mail->Body = $id_sewa;
      //
      //
      //
			//  $mail->AltBody = "YOOO E-Mail Gw UDAH SIAP BRO";
			//  if(!$mail->Send()) {
			//   echo "mail error" . $mail->ErrorInfo;
			//  } else {
			//   header("Location: index.php");
			//  }


  	}else{
  		echo 'GAGAL MENGUPLOAD GAMBAR';
  	}
       }else{
  	echo 'UKURAN FILE TERLALU BESAR';
       }
  }else{
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
  }
}
?>
