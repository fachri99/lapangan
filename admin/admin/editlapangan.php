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
                        <h3 class="page-header">Edit Lapangan</h3>
                    </div>
                </div>
                <div>
                    <?php
                    include "koneksi.php";
                    $id     = $_GET['id'];
                    $sewa  = mysqli_query($koneksi, "SELECT * FROM lapangan where id_lapangan='$id'");
                    $row    = mysqli_fetch_array($sewa);
                    ?>
                    <form method="post" action="proseseditlapangan.php" role="form" enctype="multipart/form-data">
                        <label for="inputdefault">
                            <h4>Id Lap.</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="id_lapangan" type="text" value="<?php echo $row['id_lapangan']; ?>" readonly>
                        </div>
                        <label for="inputdefault">
                            <h4>Nama</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="nama_lapangan" type="text" value="<?php echo $row['nama_lapangan']; ?>">
                        </div>
                        <label for="inputdefault">
                            Harga</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="harga_lapangan" type="number" min="10000" step="1" value="<?php echo $row['harga_lapangan']; ?>">
                        </div>
                        <label for="inputdefault">
                            Harga Malam</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="harga_lapangana" type="number" min="10000" step="1" value="<?php echo $row['harga_lapangana']; ?>">
                        </div>
                        <label for="inputdefault">
                            <h4><b>Foto</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <img src="<?php echo "../../images/lapangan/" . $row['foto']; ?>" height="150">
                        </div>
                        <div style="padding-bottom:20px">
                            <input type="file" name="foto" onchange="PreviewImage();" />
                        </div>
                        <div>
                            <center>
                                <button type="submit" name= "simpan" value="">SIMPAN</button>
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
