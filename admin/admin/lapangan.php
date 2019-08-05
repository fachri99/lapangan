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

          <?php

              if (empty($_GET['alert'])) {
                echo "";
              }

              elseif ($_GET['alert'] == 1) {
                echo "<div class='alert alert-danger alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4>  <i class='icon fa fa-times-circle'></i>Gagal!</h4>
                        Ukuran Foto Terlalu Besar.
                      </div>";
              }
              // jika alert = 2
              // tampilkan pesan Sukses "Anda telah berhasil logout"
              elseif ($_GET['alert'] == 2) {
                echo "<div class='alert alert-danger alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4>  <i class='icon fa fa-times-circle'></i>Gagal!</h4>
                        Foto yang dimasukan harus jpg atau png.
                      </div>";
              }
              elseif ($_GET['alert'] == 3) {
                echo "<div class='alert alert-danger alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4>  <i class='icon fa fa-times-circle'></i>Gagal!</h4>
                        Gagal Upload Foto.
                      </div>";
              }
              elseif ($_GET['alert'] == 4) {
                echo "<div class='alert alert-success alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4>  <i class='icon fa fa-times-circle'></i> Edit Lapangan Berhasil!</h4>
                        Lapangan Berhasil Diedit.
                      </div>";
              }
              elseif ($_GET['alert'] == 5) {
                echo "<div class='alert alert-success alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4>  <i class='icon fa fa-times-circle'></i> Input Lapangan Berhasil!</h4>
                        Lapangan Berhasil Di Input.
                      </div>";
              }
              ?>
          <div class="col-lg-12">
            <h3 class="page-header">Lapangan</h3>
          </div>
        </div>
        <div>
          <table class="table table-bordered table-striped table-hover" >
            <tr>
              <td width="100px">
              <label for="inputdefault">
                            <h4><b>Id Lap.</h4>
                        </label>
              </td>
              <td width="700px">
              <label for="inputdefault">
                            <h4><b>Nama</h4>
                        </label>
              </td>
              <td width="200px">
              <label for="inputdefault">
                            <h4><b>Harga</h4>
                        </label>
              </td>
              <td width="200px">
              <label for="inputdefault">
                            <h4><b>Harga Malam</h4>
                        </label>
              </td>
              <td colspan="2" rowspan="2" width="100px">
              <label for="inputdefault">
                            <h4><b>Aksi</h4>
                        </label>
              </td>


            </tr>
            <tr>
            </tr>
            <?php
            include 'koneksi.php';

            $data = mysqli_query($koneksi, "SELECT * FROM lapangan");
            foreach ($data as $row) {
              ?>
        <tr>
            <td>
            <?php echo $row['id_lapangan'];?>
            </td>
            <td>
            <?php echo $row['nama_lapangan'];?>
            </td>
            <td>
            <?php echo $row['harga_lapangan'];?>
            </td>
            <td>
            <?php echo $row['harga_lapangana'];?>
            </td>
            <td>
            <?php echo"<a href='editlapangan.php?id=$row[id_lapangan]'> Edit </a>
            </td>
            <td>
            <a href='deletelapangan.php?id_lapangan=$row[id_lapangan]'> Delete </a>";?>
            </td>
        </tr>


        <?php

            }
            ?>

          </table>
        </div>
      </section>
    </section>

  </section>


  <?php
  include "js.php";
  ?>

</body>

</html>
