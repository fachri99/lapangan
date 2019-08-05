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
                            <td width="500px">
                                <label for="inputdefault">
                                    <h4><b>Invoice</h4>
                                </label>
                            </td>
                            <td width="600px">
                                <label for="inputdefault">
                                    <h4><b>Id Lapangan</h4>
                                </label>
                            </td>
                            <td width="200px">
                                <label for="inputdefault">
                                    <h4><b>Tanggal Sewa</h4>
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
                        $data = mysqli_query($koneksi, "SELECT * FROM konfirmasi WHERE id_pengelola = '$id_pengelola'");
                        foreach ($data as $row) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row['id_konfirmasi']; ?>
                                </td>
                                <td>
                                    <?php echo $row['id_sewa']; ?>
                                </td>
                                <td>
                                    <?php echo $row['tgl_konfirmasi']; ?>
                                </td>
                                <td>
                                   <?php echo" <a href='lihatkonfirmasi.php?id_konfirmasi=$row[id_konfirmasi]'> Lihat </a>"?>
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
