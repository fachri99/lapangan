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
                        <h3 class="page-header">Pengelola</h3>
                    </div>
                </div>
                <div>
                    <table>
                        <tr>
                            <td width="100px">
                                <label for="inputdefault">
                                    <h4><b>Id</h4>
                                </label>
                            </td>
                            <td width="500px">
                                <label for="inputdefault">
                                    <h4><b>Nama</h4>
                                </label>
                            </td>
                            <td width="200px">
                                <label for="inputdefault">
                                    <h4><b>Username</h4>
                                </label>
                            </td>
                            <td width="200px">
                                <label for="inputdefault">
                                    <h4><b>Password</h4>
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
                        $data = mysqli_query($koneksi, "SELECT * FROM pengelola");
                        foreach ($data as $row) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row['id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['nama']; ?>
                                </td>
                                <td>
                                    <?php echo $row['username']; ?>
                                </td>
                                <td>
                                    <?php echo $row['password']; ?>
                                </td>
                                <td>
                                    <?php echo "<a href='editpengelola.php?id=$row[id]'> Edit </a>
                                </td>
                                <td>
                                    <a href='deletepengelola.php?id=$row[id]'> Delete </a>"?>
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