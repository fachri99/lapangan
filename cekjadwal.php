<?php include_once("include/main.php");?>
<?php include_once("include/header.php");
date_default_timezone_set('Asia/Jakarta');
?>
  <body>

<div class="site-wrap">
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">

          <div class="col-md-12">
            <form method="post" class="p-5 bg-white">
            <h3>Cek Jadwal</h3>
            <br>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="sewa">Tanggal Main</label>
                  <input type="text" name="tgl_main" id="tgl_main" class="form-control datepicker" data-date-format="yyyy-mm-dd"  placeholder="Silahkan Pilih Hari">
                </div>
              </div>
              <br>
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="cari" value="Cari" class="btn btn-primary pill px-4 py-2">
                </div>
              </div>
            </form>
              </div>





  <?php


    if ((isset($_POST['cari'])) AND ($_POST['tgl_main'] <> "")) {
      $id_lapangan=$_GET['id_lapangan'];
      $search = $_POST['tgl_main'];
      $sql = mysqli_query($mysqli, "SELECT * FROM sewa
                                      INNER JOIN lapangan ON sewa.id_lapangan=lapangan.id_lapangan
                                      WHERE sewa.id_lapangan = '$id_lapangan' AND DATE(sewa.jam_mulai) = '$search'")
                                      or die('Ada kesalahan pada query tampil sewa : '.mysqli_error($mysqli));
      //menampilkan jumlah hasil pencarian
      $jumlah = mysqli_num_rows($sql);
      if ($jumlah > 0) {
            while ($res=mysqli_fetch_array($sql)) {?>
<div class="col-md-12">
<table class="table table-bordered table-striped table-hover">
<tr>
  <th>Nama Lapangan</th>
  <th>Tanggal</th>
  <th>Jam Mulai</th>
  <th>Jam Selesai</th>
  <th>Status</th>
  </tr>
  <tr>
    <td><?php echo $res['nama_lapangan']; ?></td>
    <td><?php echo DATE($res['jam_mulai']) ; ?></td>
    <td><?php echo $res['jam_mulai']; ?></td>
    <td><?php echo $res['jam_selesai']; ?></td>
    <td><?php echo $res['status']; ?></td>
  </tr>

</table>
</div>
<?php
  }
  }
  else {
  // menampilkan pesan zero data
  echo 'Tanggal yang dipilih belum ada yang sewa';
  }
  }
  else { echo 'Masukkan dulu tanggal<br>';}
  ?>


</div>
</div>
</div>
</div>
  <?php include_once("include/footer.php");?>

<script src="js/main.js"></script>

  </body>
