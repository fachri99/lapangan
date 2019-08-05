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
                        <h3 class="page-header">Input Lapangan</h3>
                    </div>
                </div>
                <div>
                    <form action="prosesinputlap.php" method="post" role="form" enctype="multipart/form-data">
                        <label for="inputdefault">
                            <h4>Id Lapangan</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <?php
                            include "koneksi.php";
                            $id_pengelola = $_SESSION['id_pengelola'];
                            $query = "SELECT max(id_lapangan) as maxid FROM lapangan";
                            $hasil = mysqli_query($koneksi, $query);
                            $data = mysqli_fetch_array($hasil, MYSQLI_BOTH);
                            $id = $data['maxid'];
                            $id++;
                            ?>
                            <input class="form-control" name="id_lapangan" type="text" value="<?php echo $id; ?>" readonly>
                        </div>
                        <label for="inputdefault">
                            <h4>Nama Lapangan</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="nama_lapangan" type="text" value="" required>
                        </div>
                        <label for="inputdefault">
                            <h4>Harga</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="harga_lapangan" min="10000" step="1" type="number" value="" required>
                        </div>
                        <label for="inputdefault">
                            <h4>Harga Malam</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="harga_lapangana"  min="10000" step="1" type="number" value=""  required>
                        </div>
                        <label for="inputdefault">
                            <h4>Foto</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input type="file" name="foto" required onchange="PreviewImage();" />
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
