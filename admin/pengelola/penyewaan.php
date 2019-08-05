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
                        <h3 class="page-header">Penyewaan</h3>
                    </div>
                </div>
                <div>
                  <table class="table table-bordered table-striped table-hover">
                      <tr>
                          <td width="100px">
                              <label for="inputdefault">
                                  <h4><b>Invoice</h4>
                              </label>
                          </td>
                          <td width="200px">
                              <label for="inputdefault">
                                  <h4><b>Id Lapangan</h4>
                              </label>
                          </td>
                          <td width="200px">
                              <label for="inputdefault">
                                  <h4><b>Tanggal Sewa</h4>
                              </label>
                          </td>
                          <td width="200px">
                              <label for="inputdefault">
                                  <h4><b>Jam Mulai</h4>
                              </label>
                          </td><td width="200px">
                              <label for="inputdefault">
                                  <h4><b>Jam Selesai</h4>
                              </label>
                          </td><td width="200px">
                              <label for="inputdefault">
                                  <h4><b>Total</h4>
                              </label>
                          </td>
                          </td><td width="200px">
                              <label for="inputdefault">
                                  <h4><b>Status Pembayaran</h4>
                              </label>
                          </td>
                          <td colspan="2" rowspan="2" width="150px">
                              <label for="inputdefault">
                                  <h4><b>Aksi</h4>
                              </label>
                          </td>
                      </tr>
                      <tr>
                      </tr>
                      <?php
                      include 'koneksi.php';
                      $id_pengelola = $_SESSION['id_pengelola'];
                      $data = mysqli_query($koneksi, "SELECT * FROM sewa WHERE id_pengelola = '$id_pengelola'");
                      foreach ($data as $row) {
                          ?>
                          <tr>
                              <td>
                                  <?php echo $row['id_sewa']; ?>
                              </td>
                              <td>
                                  <?php echo $row['id_lapangan']; ?>
                              </td>
                              <td>
                                  <?php echo $row['tgl_pesan']; ?>
                              </td>
                              <td>
                                  <?php echo $row['jam_mulai']; ?>
                              </td>
                              <td>
                                  <?php echo $row['jam_selesai']; ?>
                              </td>
                              <td>
                                  <?php echo $row['total']; ?>
                              </td>
                              <td>
                                  <?php echo $row['status']; ?>
                              </td>
                              <td>
                                 <?php echo" <a href='editpenyewaan.php?id_sewa=$row[id_sewa]'> Edit </a>
                              </td>
                              <td>
                                  <a href='deletepenyewaan.php?id_sewa=$row[id_sewa]'> Delete </a>"; ?>
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
