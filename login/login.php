<?php

include "function.php";

if (isset($_POST["login"])) {

    if (login($_POST) > 0) {
        echo "<script>
            alert('sukses login !');
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>LOGIN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="dist/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="dist/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="dist/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="dist/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="dist/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="dist/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="dist/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="dist/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="dist/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="dist/css/util.css">
    <link rel="stylesheet" type="text/css" href="dist/css/main.css">

    <style>
        .alert {
            color: red;
            font-size: 14px;
        }
    </style>
    <!--===============================================================================================-->
</head>

<body>


    <div class="container-login100" style="background-image: url('dist/images/bg-02.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form class="login100-form validate-form" action="" method="POST">

                <?php
                if (isset($_GET['pesan'])) {

                    if ($_GET['pesan'] == "gagal") {
                        echo "<div class = 'alert'>Username dan password tidak sesuai !</div>";
                    }
                }
                ?>

                <span class="login100-form-title p-b-37">
                    <img src="dist/images/icons/logo.png" class="" alt="..." width="100">

                </span>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
                    <input class="input100" type="text" name="username" placeholder="username or email">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" name="login">
                        Sign In
                    </button>
                </div>

                <div class="text-center p-t-57 p-b-20">
                    <a href="#" class="txt2 hov1">
                        Daftar
                    </a>
                </div>




            </form>


        </div>
    </div>



    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="dist/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="dist/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="dist/vendor/bootstrap/js/popper.js"></script>
    <script src="dist/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="dist/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="dist/vendor/daterangepicker/moment.min.js"></script>
    <script src="dist/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="dist/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="dist/js/main.js"></script>

</body>

</html>