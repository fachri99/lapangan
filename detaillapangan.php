<?php include_once("include/main.php");?>
<?php include_once("include/header.php");?>
  <body>

    <div class="site-section bg-light">
          <div class="container">
            <div class="row">


              <?php

              $id_lapangan=$_GET['id_lapangan'];

              $query = mysqli_query($mysqli, "SELECT * FROM lapangan
                                              INNER JOIN pengelola ON lapangan.id_pengelola=pengelola.id_pengelola
                WHERE lapangan.id_lapangan = '$id_lapangan'")
                                              or die('Ada kesalahan pada query tampil lapangan : '.mysqli_error($mysqli));

              while($data = mysqli_fetch_assoc($query)) {

               ?>

              <div class="col-md-12 col-lg-8 mb-5 bg-white">
                  <div class="row form-group" >
                    <div class="col-md-12 mb-3 mb-md-0">
                      <h3 class="h3 text-black mb-3"><?php echo $data['nama_lapangan']; ?></h3>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-12">

                      <img src="images/lapangan/<?php echo $data['foto']; ?>" height="450" width="700">
                    </div>
                  </div>
                  <br>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <a href="form_sewa.php?id_lapangan=<?php echo $data['id_lapangan'] ?>" class="btn btn-primary pill px-4 py-2" role="button">Pesan</a>
                    </div>
                  </div>
              </div>

              <div class="col-lg-4">
                <div class="p-4 mb-3 bg-white">
                  <h3 class="h5 text-black mb-3">Info Kontak</h3>
                  <p class="mb-0 font-weight-bold">Alamat</p>
                  <p class="mb-4"><?php echo $data['alamat']; ?></p>

                  <p class="mb-0 font-weight-bold">Harga Sewa</p>
                  <p class="mb-4">Mulia Dari Rp. <?php echo $data['harga_lapangan']; ?></p>

                  <p class="mb-0 font-weight-bold">Email Address</p>
                  <p class="mb-0"><?php echo $data['emailpengelola']; ?></p>

                </div>
                <div class="p-4 mb-3 bg-white">
                  <h3 class="h5 text-black mb-3">Info Jadwal</h3>
                  <br>
                  <a href="cekjadwal.php?id_lapangan=<?php echo $data['id_lapangan'] ?>" class="btn btn-primary pill px-4 py-2" role="button">Cek Jadwal</a>
                </div>

              </div>
              <?php
                }
               ?>
            </div>
          </div>
        </div>

  <?php include_once("include/footer.php");?>


<script src="js/main.js"></script>
  </body>
