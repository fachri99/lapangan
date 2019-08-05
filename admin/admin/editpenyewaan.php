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
                        <h3 class="page-header">Input Penyewaan</h3>
                    </div>
                </div>
                <div>
                <?php
                include "koneksi.php";
                    $id     = $_GET['id_sewa'];
                    $sewa  = mysqli_query($koneksi, "SELECT * FROM sewa where id_sewa='$id'");
                    $row    = mysqli_fetch_array($sewa);
                    ?>
                    <h2>Edit Info</h2>
                    <form method="pogetst" action="proseseditsewa.php" role="form">
                        <label for="inputdefault">
                            <h3>Invoice</h3>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="id_sewa" type="text" value="<?php echo $row['id_sewa']; ?>" readonly>
                        </div>
                        <label for="inputdefault">
                            <h4>ID Lapangan</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="nama_lap" type="text" value="<?php echo $row['id_lapangan']; ?>" readonly>
                        </div>
                        <label for="inputdefault">
                            <h4>Jam Mulai</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="jam_mulai" type="text" value="<?php echo $row['jam_mulai']; ?>" readonly>
                        </div>
                        <label for="inputdefault">
                            <h4>Jam Selesai</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="jam_selesai" type="text" value="<?php echo $row['jam_selesai']; ?>" readonly>
                        </div>
                        <label for="inputdefault">
                            <h4>Total Biaya</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="total" type="text" value="<?php echo $row['total']; ?>" readonly>
                        </div>
                        <label for="inputdefault">
                            <h4>Status Pembayaran</h4>
                        </label>
                        <div style="padding-bottom:20px">
                          <select class="form-control" name="status" value"<?php echo $row['status']; ?>">
                                <option value="Sudah Konfirmasi">Sudah Konfirmasi</option>
                                <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                                <option value="Disewakan">Disewakan</option>

                                </select>
                        </div>
                        <div>
                            <center>
                                <button type="submit" value="">SIMPAN</button>
                            </center>
                        </div>
                    </form>
                </div>
            </section>
        </section>

    </section>

    <?php
    include "js.php";
    ?>

</body>

</html>
