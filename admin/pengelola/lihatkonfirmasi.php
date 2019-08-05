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
                        <h3 class="page-header">Lihat Konfirmasi</h3>
                    </div>
                </div>
                <div>
                    <?php
                    include "koneksi.php";
                    $id     = $_GET['id_konfirmasi'];
                    $sewa  = mysqli_query($koneksi, "SELECT * FROM konfirmasi where id_konfirmasi='$id'");
                    $row    = mysqli_fetch_array($sewa);
                    ?>
                        <label for="inputdefault">
                            <h4>Id Konfirmasi.</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="id_lapangan" type="text" value="<?php echo $row['id_konfirmasi']; ?>" readonly>
                        </div>
                        <label for="inputdefault">
                            <h4>Invoice</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="nama_lapangan" type="text" value="<?php echo $row['id_sewa']; ?>"readonly>
                        </div>
                        <label for="inputdefault">
                            Tanggal Konfirmasi</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="harga_lapangan" type="text" value="<?php echo $row['tgl_konfirmasi']; ?>"readonly>
                        </div>
                        <label for="inputdefault">
                            <h4><b>Bukti</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <img src="<?php echo "../../images/bukti/" . $row['bukti']; ?>">
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
