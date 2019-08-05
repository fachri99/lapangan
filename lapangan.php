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
                      <h4>  <i class='icon fa fa-times-circle'></i>Pemesanan Gagal !</h4>
                      Tanggal dan waktu yang dipilih telah disewa, Harap pilih lapangan atau waktu lain.
                    </div>";
            }
            // jika alert = 2
            // tampilkan pesan Sukses "Anda telah berhasil logout"
            elseif ($_GET['alert'] == 2) {
              echo "<div class='alert alert-success alert-dismissable'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                      <h4>  <i class='icon fa fa-check-circle'></i> Success!</h4>
                      Anda telah berhasil logout.
                    </div>";
            }
            ?>
        <div class="row mb-5">


          <?php
          // fungsi query untuk menampilkan data dari tabel portfolio
          $query = mysqli_query($mysqli, "SELECT * FROM lapangan")
                                          or die('Ada kesalahan pada query tampil portfolio : '.mysqli_error($mysqli));

          while($data = mysqli_fetch_assoc($query)) {
          ?>



          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">

            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                  <img src="images/lapangan/<?php echo $data['foto']; ?>" alt="Portfolio"  height="300" width="300">
              </div>
              <h2 class="heading mb-0"><?php echo $data['nama_lapangan']; ?></h2>
              <span class="mb-3 d-block post-date">Mulai Dari Rp. <?php echo $data['harga_lapangan']; ?></a></span>
              <p>
              <a href="detaillapangan.php?id_lapangan=<?php echo $data['id_lapangan'] ?>" class="btn btn-primary pill px-4 py-2" href="#" role="button">Lihat Detail</a>
              <a href="form_sewa.php?id_lapangan=<?php echo $data['id_lapangan'] ?>" class="btn btn-primary pill px-4 py-2" href="#" role="button">Pesan</a>
              </p>
              <br>
            </div>
          </div>

          <?php } ?>
          </div>
          </div>
          </div>
          <?php include_once("include/footer.php");?>
          </div>
          <script src="js/main.js"></script>

        </body>
