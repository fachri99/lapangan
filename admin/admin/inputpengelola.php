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
                        <h3 class="page-header">Input Pengelola</h3>
                    </div>
                </div>
                <div>
                    <form action="prosespengelola.php" method="post" role="form">
                        <label for="inputdefault">
                            <h4>Id Pengelola</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <?php
                            include "koneksi.php";

                            $query = "SELECT max(id_pengelola) as maxid FROM pengelola";
                            $hasil = mysqli_query($koneksi, $query);
                            $data = mysqli_fetch_array($hasil, MYSQLI_BOTH);
                            $id = $data['maxid'];
                            $id++;
                            ?>
                            <input class="form-control" name="id" type="text" value="<?php echo $id; ?>" readonly>
                        </div>
                        <label for="inputdefault">
                            <h4>Nama</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="nama_pengelola" type="text" value="" required>
                        </div>
                        <label for="inputdefault">
                            <h4>Email</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="emailpengelola" type="text" value=""required>
                        </div>
                        <label for="inputdefault">
                            <h4>No Hp</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="nohppengelola" type="text" value=""required>
                        </div>
                        <label for="inputdefault">
                            <h4>username</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="username" type="username" value=""required>
                        </div>
                        <label for="inputdefault">
                            <h4>Password</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="password" type="password" value=""required>
                        </div>
                        <label for="inputdefault">
                            <h4>Alamat</h4>
                        </label>
                        <div style="padding-bottom:20px">
                            <input class="form-control" name="alamat" type="text" value=""required>
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
