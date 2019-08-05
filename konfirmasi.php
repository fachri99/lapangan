<?php include_once("include/main.php");?>
<?php include_once("include/header.php");?>
  <body>

<div class="site-wrap">
    <div class="site-section bg-light">
      <div class="container">
        <?php

            if (empty($_GET['alert'])) {
              echo "";
            }

            elseif ($_GET['alert'] == 1) {
              echo "<div class='alert alert-danger alert-dismissable'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                      <h4>  <i class='icon fa fa-times-circle'></i>Konfirmasi Gagal !</h4>
                      File yang dimasukan harus jpg atau png.
                    </div>";
            }
            // jika alert = 2
            // tampilkan pesan Sukses "Anda telah berhasil logout"
            elseif ($_GET['alert'] == 2) {
              echo "<div class='alert alert-success alert-dismissable'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                      <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
                      File yang dimasukan terlalu besar.
                    </div>";
            }
            ?>
        <div class="row">

          <div class="col-md-12">


            <h3>Masukkan Kode Invoice</h3>
            <hr>
            <div class="row">
             <div class="col-md-5">
             <form role="form" action="konfirmasi.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
              <label>Kode Invoice:</label>
              <input type="text" name="cari" class="form-control" placeholder="Kode Invoice..">
              </div>
              <button type="submit" name="submit" class="btn btn-info btn-block">Search</button>
              <label name:"masukkan"></label>
                 </form>
               </div>
               <?php

                 if ((isset($_POST['submit'])) AND ($_POST['cari'] <> "")) {
                   $search = $_POST['cari'];

                   $sql = mysqli_query($mysqli, "SELECT * FROM sewa
                                                INNER JOIN lapangan ON sewa.id_lapangan=lapangan.id_lapangan
                                                INNER JOIN pelanggan on sewa.id_pelanggan=pelanggan.id_pelanggan
                                                INNER JOIN pengelola on sewa.id_pengelola=pengelola.id_pengelola
                                                WHERE sewa.id_sewa like '$search'")
                                                   or die('Ada kesalahan pada query tampil sewa : '.mysqli_error($mysqli));

                   //menampilkan jumlah hasil pencarian
                   $jumlah = mysqli_num_rows($sql);
                   if ($jumlah > 0) {
                         while ($res=mysqli_fetch_array($sql)) {
                    ?>


</div>
<hr>
<div class="row">
 <div class="col-md-12">

   <h3>Detail konfirmasi</h3>
   <hr>
   <div class="container">
     <div class="row">
       <div class="col-sm-12">
         <form action="proses_konfirmasi.php" method="post" class="p-5 bg-white" enctype="multipart/form-data">
         <label class="font-weight-bold">No Invoice</label><br>
         <input type="hidden" name="emailpengelola" value="<?php echo $res['emailpengelola'];?>">
         <input type="hidden" name="id_pengelola" value="<?php echo $res['id_pengelola'];?>">
         <input type="text" name="id_sewa" class="form-control"  required value="<?php echo $res['id_sewa']; ?>" readonly>
         <label class="font-weight-bold"></label>
         <hr>
         <label class="font-weight-bold">Nama Pelanggan</label><br>
         <input type="text" name="nama_lapangan" class="form-control"  required value="<?php echo $res['nama_pelanggan']; ?>" readonly>
         <hr>
         <label class="font-weight-bold">Nama Lapangan</label><br>
         <input type="text" name="nama_lapangan" class="form-control"  required value="<?php echo $res['nama_lapangan']; ?>" readonly>
         <hr>
         <label class="font-weight-bold">Tanggal Main</label><br>
         <input type="text" name="jam_mulai" class="form-control"  required value="<?php echo $res['jam_mulai']; ?>" readonly>
         <hr>
         <label class="font-weight-bold">Lama Main</label><br>
         <input type="text" name="lama_sewa" class="form-control" required value="<?php echo $res['lama_sewa']; ?> Jam" readonly>
         <hr>
         <label class="font-weight-bold">Total</label><br>
         <input type="text" name="total" class="form-control"  required value="Rp. <?php echo $res['total']; ?>" readonly>
         <hr>
         <label class="font-weight-bold">Masukkan Bukti Transfer</label><br>
         <input style="height:35px" type="file" name="foto" autocomplete="off" required>
         <hr>
       </div>

     </div>
   </div>
  <input type="submit" name="sewa" value="Konfirmasi" class="btn btn-primary pill px-4 py-2">
</form>
  </div>


</div>
<?php

}
}
else {
// menampilkan pesan zero data
echo 'Maaf, hasil pencarian tidak ditemukan.';
}
}
else { echo 'Masukkan dulu kata kuncinya<br>';}
?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once("include/footer.php");?>


<script src="js/main.js"></script>
  </body>
