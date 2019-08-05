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
                        <h3 class="page-header">Laporan</h3>
                    </div>
                </div>
                <div>
                <div>
                    <a href="prosesprint.php" target="_blank">CETAK DATA</a>
                </div>

                <br>
                <select name="pengelola" class="form-control" id="selector">
                  <option value="all">-- Select One --</option>
                  <option value="all">Semua Data Sewa</option>
                <?php
                include 'koneksi.php';
                $query = "select * from pengelola";
                $hasil = mysqli_query($koneksi,$query);
                while($data=mysqli_fetch_array($hasil)){

                    echo "<option value=$data[id_pengelola]>$data[nama_pengelola]</option>";
                }
                ?>
                </select>
                <br>

                <table class="table table-bordered table-striped table-hover">
                  <thead>
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

                    </tr>
                  </thead>
                  <tbody id="response">

                  </tbody>

                </table>
                </div>



            </section>

        </section>

    </section>

    <?php
    include "js.php";
    ?>
    <script>
    $(document).ready(function(){
        $('#selector').change(function(){
            id_trigger = $(this).children("option:selected").val();;
            $.ajax({
             type: "POST",
             data: {id:id_trigger},
             url: "laporan_receiver.php",
             success: function(data){
            $('#response').html(data);
            }
           });
        });
    });
    </script>
</body>

</html>
