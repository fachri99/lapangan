<?php include_once("include/main.php");?>
<?php include_once("include/header.php");?>
  <body>

<div class="site-wrap">
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">

          <div class="col-md-12">

            <?php
            date_default_timezone_set('Asia/Jakarta');
            	$tanggal = date("Y-m-d H:i:s");              // fungsi untuk membuat id Sewa
            								$qu =mysqli_query($mysqli, "SELECT max(id_pelanggan) as maxKode FROM pelanggan");
            								$data = mysqli_fetch_array($qu);
            								$noOrder = $data['maxKode'];
            								$noUrut = (int) substr($noOrder, 9, 3);
            								$noUrut++;
            								$char = "PL";
            								$tahun=substr($tanggal, 0, 4);
            								$bulan=substr($tanggal, 5, 2);
                            $hari=substr($tanggal, 8, 2);
                            $jam=substr($tanggal, 11, 2);
                            $menit=substr($tanggal, 14, 2);
                            $detik=substr($tanggal, 17, 2);
            								$id_konfirmasi = $char .$tahun .$bulan .$hari .$jam .$menit .$detik . sprintf("%04s", $noUrut);
            ?>

<?php

$id_lapangan=$_GET['id_lapangan'];

$query = mysqli_query($mysqli, "SELECT * FROM lapangan WHERE id_lapangan = '$id_lapangan'")
                                or die('Ada kesalahan pada query tampil portfolio : '.mysqli_error($mysqli));

while($data = mysqli_fetch_assoc($query)) {

 ?>

            <form action="proses_sewa.php" method="post" class="p-5 bg-white" id="form" target="_blank">
<h3>Form Penyewaan</h3>
<br>
<div class="row form-group">
  <div class="col-md-12">
    <label class="font-weight-bold" for="nama">Id Pelanggan</label>
    <input type="text" name="id_pelanggan" class="form-control" placeholder="id user" required value="<?php echo $id_konfirmasi; ?>" readonly>
  </div>
</div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="nama">Nama</label>
                  <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="nohp">Nomor Hp</label>
                  <input type="number" name="nohp" class="form-control" placeholder="Nomor Hp" required>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="idlapangan">Id Lapangan</label>

                  <input type="text" name="id_lapangan" class="form-control" placeholder="Lapangan" readonly value="<?php echo $data['id_lapangan']; ?>">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="lapangan">Lapangan</label>
                  <input type="hidden" name="id_pengelola" value="<?php echo $data['id_pengelola'];?>">
                  <input type="text" name="lapangan" class="form-control" placeholder="Lapangan" readonly value="<?php echo $data['nama_lapangan']; ?>">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="harga">Harga Perjam</label>
                  <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga" readonly value="<?php echo $data['harga_lapangan']; ?>">
                  <br>
                  <input type="text" name="hargaa" class="form-control" id="hargaa" placeholder="Harga" readonly value="<?php echo $data['harga_lapangana']; ?>">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="sewa">Tanggal Main</label>
                  <input type="text" name="tgl_main" id="tgl_main" class="form-control datepicker" required data-date-format="yyyy-mm-dd" data-date-start-date="+1d" placeholder="Silahkan Pilih Hari">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="sewa">Jam Mulai</label>
                  <select name="jam_mulai" id="jam_mulai"class='form-control'>
  								<option value="08:00:00">08:00</option>
  								<option value="09:00:00">09:00</option>
  								<option value="10:00:00">10:00</option>
  								<option value="11:00:00">11:00</option>
  								<option value="12:00:00">12:00</option>
  								<option value="13:00:00">13:00</option>
  								<option value="14:00:00">14:00</option>
  								<option value="15:00:00">15:00</option>
  								<option value="16:00:00">16:00</option>
  								<option value="17:00:00">17:00</option>
  								<option value="18:00:00">18:00</option>
  								<option value="19:00:00">19:00</option>
  								<option value="20:00:00">20:00 (Malam)</option>
  								<option value="21:00:00">21:00 (Malam)</option>
  								<option value="22:00:00">22:00 (Malam)</option>
  								<option value="23:00:00">23:00 (Malam)</option>
  							</select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="sewa">Jam Selesai</label>
                  <select name="jam_selesai" id="jam_selesai" class='form-control' onchange="jam();">
                  <option value="09:00:00">09:00</option>
                  <option value="10:00:00">10:00</option>
                  <option value="11:00:00">11:00</option>
                  <option value="12:00:00">12:00</option>
                  <option value="13:00:00">13:00</option>
                  <option value="14:00:00">14:00</option>
                  <option value="15:00:00">15:00</option>
                  <option value="16:00:00">16:00</option>
                  <option value="17:00:00">17:00</option>
                  <option value="18:00:00">18:00</option>
                  <option value="19:00:00">19:00</option>
                  <option value="20:00:00">20:00 (Malam)</option>
  								<option value="21:00:00">21:00 (Malam)</option>
  								<option value="22:00:00">22:00 (Malam)</option>
  								<option value="23:00:00">23:00 (Malam)</option>>
                  <option value="24:00:00">24:00 (Malam)</option>
                </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="lama">Lama Sewa</label>

                  <input type="text" name="lama_sewa"  id="lama_sewa" class="form-control" placeholder="Lama Sewa" readonly required>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="total">Total Harga</label>
                  <input type="text" name="total" id ="total" class="form-control" placeholder="Total Harga" readonly required   >


                </div>
              </div>
              <br>
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="sewa" value="Sewa" class="btn btn-primary pill px-4 py-2" onClick="window.location.reload()" >
                </div>
              </div>


            </form>
          </div>
        <?php } ?>

        </div>
      </div>
    </div>
  </div>

  <?php include_once("include/footer.php");?>
  <script>
  function jam() {
    var jam_mulaia = document.getElementById('jam_mulai').value;
    var tanggal = document.getElementById('tgl_main').value;
    var jam_selesaia = document.getElementById('jam_selesai').value;

    if(jam_mulaia >= '20:00:00'){
  var Hasilharga = document.getElementById('hargaa').value;
  var diff = ( new Date(tanggal+" " + jam_selesaia) - new Date(tanggal+" " + jam_mulaia) ) / 1000 / 60 / 60;
  document.getElementById('lama_sewa').value = diff;
  if (diff < 1)
  {
     alert("Jam mulai tidak boleh ");
     document.getElementById("jam_mulai").selectedIndex = "08:00:00";
     document.getElementById("jam_selesai").selectedIndex = "09:00:00";
     document.getElementById("lama_sewa").value="";
     document.getElementById("total").value="";
   }else {
     document.getElementById('lama_sewa').value=diff +" jam";
     var tHarga = diff * Hasilharga;
     var	number_string = tHarga.toString(),
       sisa 	= number_string.length % 3,
       rupiah 	= number_string.substr(0, sisa),
       ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
       if (ribuan) {
       separator = sisa ? '.' : '';
       rupiah += separator + ribuan.join('.');
     }
     document.getElementById('total').value=rupiah;


   }


}else {
  var jam_mulaia = document.getElementById('jam_mulai').value;
  var tanggal = document.getElementById('tgl_main').value;
  var jam_selesaia = document.getElementById('jam_selesai').value;

  var Hasilml = document.getElementById('harga').value;
  var diff = ( new Date(tanggal+" " + jam_selesaia) - new Date(tanggal+" " + jam_mulaia) ) / 1000 / 60 / 60;
  document.getElementById('lama_sewa').value = diff;

  if (diff < 1)
  {
     alert("Jam mulai tidak boleh ");
     document.getElementById("jam_mulai").selectedIndex = "08:00:00";
     document.getElementById("jam_selesai").selectedIndex = "09:00:00";
     document.getElementById("lama_sewa").value="";
     document.getElementById("total").value="";
   }else {
     document.getElementById('lama_sewa').value=diff +" jam";
     var tHarga = diff * Hasilml;
     var	number_string = tHarga.toString(),
       sisa 	= number_string.length % 3,
       rupiah 	= number_string.substr(0, sisa),
       ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
       if (ribuan) {
       separator = sisa ? '.' : '';
       rupiah += separator + ribuan.join('.');
     }
     document.getElementById('total').value=rupiah;


   }

}

  }

  </script>




  <!-- <script>
  function sum() {
        var txtFirstNumberValue = document.getElementById('jam_mulai').value;
        var txtSecondNumberValue = document.getElementById('jam_selesai').value;
        var tanggal = document.getElementById('tgl_main').value;
        var diff = ( new Date(tanggal+" " + txtSecondNumberValue) - new Date(tanggal+" " + txtFirstNumberValue) ) / 1000 / 60 / 60;
        if (diff < 1)
{
           alert("Jam mulai tidak boleh ");
           document.getElementById("jam_mulai").selectedIndex = "08:00:00";
           document.getElementById("jam_selesai").selectedIndex = "09:00:00";
           document.getElementById("lama_sewa").value="";
           document.getElementById("total").value="";
}
else
{
          var Hasilhargaa = document.getElementById('harga').value;
           document.getElementById('lama_sewa').value=diff +" jam";
           var tHarga = diff * Hasilharga;
           var	number_string = tHarga.toString(),
             sisa 	= number_string.length % 3,
             rupiah 	= number_string.substr(0, sisa),
             ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
             if (ribuan) {
             separator = sisa ? '.' : '';
             rupiah += separator + ribuan.join('.');
           }
           document.getElementById('total').value=rupiah;
}
}
  </script> -->
<script src="js/main.js"></script>
  </body>
