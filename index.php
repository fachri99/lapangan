<!DOCTYPE html>
<?php include_once("include/main.php");?>
<?php include_once("include/header.php");?>

  <body>

    <div class="site-blocks-cover" style="background-image: url(images/futsal1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center" data-aos="fade">
            
          </div>
        </div>
      </div>
    </div>



    <div class="site-section block-15">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2>Lapangan</h2>
          </div>
        </div>


        <div class="nonloop-block-15 owl-carousel">

          <?php
          // fungsi query untuk menampilkan data dari tabel portfolio
          $query = mysqli_query($mysqli, "SELECT * FROM lapangan ORDER BY id_lapangan DESC LIMIT 3")
                                          or die('Ada kesalahan pada query tampil portfolio : '.mysqli_error($mysqli));

          while($data = mysqli_fetch_assoc($query)) {
          ?>

            <div class="media-with-text">
              <div class="img-border-sm mb-4">
              <img src="images/lapangan/<?php echo $data['foto']; ?>" alt="Foto"  height="300" width="300">

              </div>
              <h2 class="heading mb-0"><a href="#" ><?php echo $data['nama_lapangan']; ?></a></h2>
              <span class="mb-3 d-block post-date"><?php echo $data['harga_lapangan']; ?></a></span>
              <p>
              <a href="detaillapangan.php?id_lapangan=<?php echo $data['id_lapangan'] ?>" class="btn btn-primary pill px-4 py-2" href="#" role="button">Lihat Detail</a>
              <a href="form_sewa.php?id_lapangan=<?php echo $data['id_lapangan'] ?>" class="btn btn-primary pill px-4 py-2"  role="button">Pesan</a>
              </p>
            </div>
          <?php } ?>
        </div>

        <div class="row">
                <div class="col-md-12 text-center">
                    <a style="width:150px" href="lapangan.php" class="btn btn-primary"> View All</a>
                </div>
            </div>
      </div>
    </div>

<script src="js/main.js"></script>


<?php include_once("include/footer.php");?>
  </body>
</html>
