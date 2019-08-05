<?php
include 'koneksi.php';

session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
} else {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
}
if (isset($_POST["submit_login"])) {
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
    <section id="container">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Laporan</h3>
                </div>
            </div>
            <div>

                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <td width="50px">
                                <label for="inputdefault">
                                    <h4><b>Id</h4>
                                </label>
                            </td>
                            <td width="300px">
                                <label for="inputdefault">
                                    <h4><b>Nama Lapangan</h4>
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
                            </td>
                            <td width="200px">
                                <label for="inputdefault">
                                    <h4><b>Jam Selesai</h4>
                                </label>
                            </td>
                            <td width="200px">
                                <label for="inputdefault">
                                    <h4><b>Total</h4>
                                </label>
                            </td>
                            </td>
                            <td width="200px">
                                <label for="inputdefault">
                                    <h4><b>Status Pembayaran</h4>
                                </label>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                        <?php


                        include 'koneksi.php';
                        if(isset($_POST['sewa']))
                        {
                        $id_pengelola = $_SESSION['id_pengelola'];
                        $bulan = $_POST['bulan'];
                        $data = mysqli_query($koneksi, "SELECT * FROM sewa WHERE id_pengelola = '$id_pengelola' AND MONTH(tgl_pesan)='$bulan'");
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
                                    <?php echo $row['id_pengelola']; ?>
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
                            </tr>
                        <?php
                      }
                        }
                        ?>
                        <tr>
                        <td colspan="5">
                        Total
                        </td>
                        <td colspan="2">
                          <?php
                        $jumlahkan = "SELECT SUM(total) AS jumlah_total FROM sewa WHERE id_pengelola = '$id_pengelola' AND MONTH(tgl_pesan)='$bulan'";
                        $hasil =mysqli_query($koneksi, $jumlahkan) or die (mysqli_error());
                        $t = mysqli_fetch_array($hasil);
                        echo "<b> RP." .($t['jumlah_total']). " </b>";?>
                        </td>
                        </tr>
                    </table>
            </div>
            <script>
               window.print();
            </script>
        </section>
    </section>

    <?php
    include "js.php";
    ?>

</body>

</html>
