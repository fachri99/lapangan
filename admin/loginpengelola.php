<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Pengelola</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/font.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="p-5">
                                <h1 class="h4 text-gray-900 mb-4">Login As Pengelola</h1>
                                    <form class="user" action="prosesloginpengelola.php">
                                        <?php
                                        if (isset($_GET['pesan'])) {
                                            $pesan = $_GET['pesan'];
                                            if ($pesan == "kosong") {
                                                echo "<center><h4>Silahkan lengkapi data !</h4><br></center>";
                                            } elseif ($pesan == "salah") {
                                                echo "<center><h4>Username atau password yang anda masukan salah !</h4><br></center>";
                                            }
                                        }
                                        ?>
                                        <div class="form-group">
                                            <input type="username" class="form-control form-control-user" name="username" aria-describedby="emailHelp" placeholder="Masukan username anda...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Masukan password anda...">
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <input class="btn btn-primary btn-user btn-block" type="submit" value="Login">
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
