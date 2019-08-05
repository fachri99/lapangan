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
                    <?php
                    include "koneksi.php";
                    $id_pengelola     = $_GET['id_pengelola'];
                    $kelola  = mysqli_query($koneksi, "SELECT * FROM pengelola where id_pengelola='$id_pengelola'");
                    $row    = mysqli_fetch_array($kelola);
                    ?>
                    <form method="pogetst" action="proseseditkelola.php" role="form">
                        <input class="form-control" name="id_pengelola" type="text" value="<?php echo $row['id_pengelola']; ?>" readonly>
                </div>
                <label for="inputdefault">
                    <h4>Nama</h4>
                </label>
                <div style="padding-bottom:20px">
                    <input class="form-control" name="nama_pengelola" type="text" value="<?php echo $row['nama_pengelola'] ?>" required>
                </div>
                <label for="inputdefault">
                    <h4>Username</h4>
                </label>
                <div style="padding-bottom:20px">
                    <input class="form-control" name="username" type="text" value="<?php echo $row['username'] ?>" required>
                </div>
                <label for="inputdefault">
                    <h4>Password</h4>
                </label>
                <div style="padding-bottom:20px">
                    <input class="form-control" name="password" type="text" value="<?php echo $row['password'] ?>" required>
                </div>
                <label for="inputdefault">
                    <h4>No Hp</h4>
                </label>
                <div style="padding-bottom:20px">
                    <input class="form-control" name="nohppengelola" type="text" value="<?php echo $row['nohppengelola'] ?>" required>
                </div>
                <label for="inputdefault">
                    <h4>Email</h4>
                </label>
                <div style="padding-bottom:20px">
                    <input class="form-control" name="emailpengelola" type="email" value="<?php echo $row['emailpengelola'] ?>" required>
                </div>
                <label for="inputdefault">
                    <h4>Alamat</h4>
                </label>
                <div style="padding-bottom:20px">
                    <input class="form-control" name="alamat" type="text" value="<?php echo $row['alamat'] ?>" required>
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
