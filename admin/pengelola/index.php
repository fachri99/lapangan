<?php
include 'koneksi.php';

session_start();
if(!isset($_SESSION['username'])) {
   header('location:../index.php');
} else {
   $username = $_SESSION['username'];
   $password = $_SESSION['password'];
}
if(isset($_POST["submit_login"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include "headscript.php";
  ?>

</head>

<body>
  <section id="container" class="">
<?php
include "header.php";
include "sidebar.php"
?>

      </div>
    </aside>


    <section id="main-content">
      <section class="wrapper">

        <div class="row">
          <div class="col-lg-12">
          <?php
              $sql_login = "SELECT * FROM pengelola WHERE username = '$username' AND password = '$password'";
              $result = mysqli_query($koneksi, $sql_login);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <h3 class="page-header"><b>Selamat Datang <?php echo $row['nama_pengelola']; ?></h3>
                <?php
              }
            }
            ?>

          </div>
        </div>
      </section>
    </section>

  </section>

  <?php
  include "js.php";
  ?>

</body>

</html>
