<header class="header blue-bg">
  <div class="toggle-nav">
    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
  </div>

  <!--logo start-->
  <a href="index.html" class="logo"></a>
  <!--logo end-->

  <div class="top-nav notification-row">
    <!-- notificatoin dropdown start-->
    <ul class="nav pull-right top-menu">
      <!-- user login dropdown start-->
      <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
          <?php
          $sql_login = "SELECT * FROM pengelola WHERE username = '$username' AND password = '$password'";
          $result = mysqli_query($koneksi, $sql_login);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <i class="icon_profile"></i>
              <b class="caret"></b>
            <?php
            }
          }
          ?>
        </a>
        <ul class="dropdown-menu extended logout">
          <div class="log-arrow-up"></div>
          <li class="eborder-top">
            <a href="#"><i class="icon_profile"></i> My Profile</a>
          </li>
          <li>
            <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
          </li>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</header>
