<?php include_once("include/koneksi.php");?>

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/invoice.css" />
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="plugins/datepicker1/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">



    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="plugins/datepicker1/js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>


    <script src="js/mediaelement-and-player.min.js"></script>

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
