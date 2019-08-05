<?php
if(isset($_POST['submit'])){    
  $name_save = $_POST['name'];
  $email_save = $_POST['email'];
  
  if (isset($_FILES['image']['tmp_name'])) {
  $file=$_FILES['image']['tmp_name'];
  $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
  $image_name= addslashes($_FILES['image']['name']);
  move_uploaded_file($_FILES["image"]["tmp_name"],"photos/" . $_FILES["image"]["name"]);
  $image_save ="photos/" . $_FILES["image"]["name"];
  }
  mysql_query("UPDATE table SET Name ='$name_save', Email  ='$email_save',Image ='$image_save' WHERE id = '$id'")
  or die(mysql_error()); 
  header("Location: index.php");      }
?>