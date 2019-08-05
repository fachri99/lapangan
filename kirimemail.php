<?php
 require 'phpmailer/PHPMailerAutoload.php';



$nama_penerima=$_POST['nama'];
$email_penerima=$_POST['email'];
$subjek=$_POST['subjek'];
$pesan=$_POST['pesan'];

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
 $email = $email_penerima;
 $name = $nama_penerima;
 $mail->From= $webmaster_email;
 $mail->FromName="Kemal Pahlevi";
 $mail->AddAddress($email, $name);

 $mail->AddReplyTo($webmaster_email, "Nama Pengirim");
 $mail->WordWrap = 50;

 $mail->IsHTML(true);
 $mail->Subject = $subjek;
 $mail->Body = $pesan;

 $mail->AltBody = "YOOO E-Mail Gw UDAH SIAP BRO";
 if(!$mail->Send()) {
  echo "mail error" . $mail->ErrorInfo;
 } else {
  echo "email berhasil di kirim";
 }


?>
