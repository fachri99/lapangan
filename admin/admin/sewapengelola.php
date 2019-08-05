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
            <h3 class="page-header">Laporan Pengelola</h3>
            <form action="cetakpengelola.php" method="post" class="p-5 bg-white" id="form" target="_blank">
          </div>
        </div>
        <div class="col-md-3">
          <div>
            <select name="id_pengelola" class="form-control" id="selector">

            <?php
            include 'koneksi.php';
            $query = "select * from pengelola";
            $hasil = mysqli_query($koneksi,$query);
            while($data=mysqli_fetch_array($hasil)){

                echo "<option value=$data[id_pengelola]>$data[nama_pengelola]</option>";
            }
            ?>
            </select>
          </div>
        </div>
          <div class="col-md-3">
            <div>
              <select name="bulan" class="form-control" id="selector">
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>


              </select>
            </div>
        </div>
        <div class="col-md-3">
          <div>
            <input type="submit" name="sewa" value="Cetak" class="btn btn-primary pill px-4 py-2">
          </div>
      </div>
      </div>
    </form>
      </section>
    </section>

  </section>

  <?php
  include "js.php";
  ?>

</body>

</html>
