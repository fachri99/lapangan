<?php include_once("include/main.php");?>
<?php include_once("include/header.php");?>

  <body>
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6" data-aos="fade" >
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d495.7399949392278!2d106.83405384545895!3d-6.2742547053439335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f23c13328c95%3A0x33d6a539af891047!2sJl.+Amil+No.17%2C+RT.3%2FRW.4%2C+Pejaten+Bar.%2C+Kec.+Ps.+Minggu%2C+Kota+Jakarta+Selatan%2C+Daerah+Khusus+Ibukota+Jakarta+12510!5e0!3m2!1sid!2sid!4v1563168244062!5m2!1sid!2sid" width="1000" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>

      </div>
    </div>
    <div class="py-5 quick-contact-info">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div>
              <h2><span class="icon-room"></span> Location</h2>
              <p class="mb-0">Jalan Amil RT.003 04 Pejaten Barat <br>  DKI Jakarta</p>
            </div>
          </div>
          <div class="col-md-4">
            <div>
              <h2><span class="icon-clock-o"></span>Jam Pelayanan</h2>
              <p class="mb-0">Setiap Hari 8:00PM - 12:00PM</p>
            </div>
          </div>
          <div class="col-md-4">
            <h2><span class="icon-comments"></span> Kontak</h2>
            <p class="mb-0">Email: flank@gmail.com <br>
            Phone: (+62) 83897892230 </p>
          </div>
        </div>
      </div>
    </div>


    <footer class="site-footer">
    <?php include_once("include/footer.php");?>
    </footer>
  </div>

  <script src="js/main.js"></script>


  <script>
      document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
                    new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                        shimScriptAccess: 'always',
                        success: function () {
                            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                            for (var j = 0; j < targetTotal; j++) {
                                target[j].style.visibility = 'visible';
                            }
                  }
                });
                }
            });
    </script>

  </body>
</html>
