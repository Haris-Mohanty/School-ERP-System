<?php

require("Common_files/php/database.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP CSS LINK START -->
    <link rel="stylesheet" href="Common_files/css/bootstrap.min.css" />
    <!-- BOOTSTRAP CSS LINK END -->

    <!-- BOOTSTRAP JS LINK START -->
    <script src="Common_files/js/bootstrap.bundle.min.js"></script>
    <!-- BOOTSTRAP JS LINK END -->

    <!-- ANIMATE CSS LINK START -->
    <link rel="stylesheet" href="Common_files/css/animate.min.css" />
    <!-- ANIMATE CSS LINK END -->

    <!-- SWEET ALERT JS LINK START -->
    <script src="Common_files/js/sweetalert.min.js"></script>
    <!-- SWEET ALERT JS LINK END -->

    <!--FONT AWESOME LINK START -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!--FONT AWESOME LINK END -->

    <!-- JQUERY LINK START -->
    <script src="Common_files/js/jquery.min.js"></script>
    <!-- JQUERY LINK END -->

    <!--   GOOGLE FONT START -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide"/>
    <!--   GOOGLE FONT END -->

    <title>Privacy Policy</title>
    <link rel="stylesheet" href="pages/index.css">
</head>
<body>
    <!-- nav -->
    <?php require("assets/nav.php"); ?>

    <!-- LOGIN CODE START -->
    <div class="container bg-white shadow-lg border p-4" style="margin-top:100px">
        <h2>Login With Us</h2>
        <hr>
        <div class="row">
            <div class="col-md-6">
               <label for="email">Email</label>
               <input type="email" id="username" class="form-control mb-3">
               <label for="password">Password</label>
               <input type="password" id="password" class="form-control mb-3">
               <input type="radio" name="user" class="user" id="admin" value="admin"><label for="admin" style="cursor: pointer;">Admin</label> &nbsp; &nbsp;
               <input type="radio" name="user" class="user" id="student" value="student"><label for="student" style="cursor: pointer;">Student</label><br><br>
               <button class="btn btn-primary login-btn w-100">Login Now</button>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5 text-center mt-5">
                <h3>
                    I don't have any Account!
                </h3>
                <a href="register.php" class="btn btn-success">Register</a>
            </div>
        </div>
    </div>
    <!-- LOGIN CODE END -->

    <!-- footer -->
    <?php require("assets/footer.php"); ?>
     
</body>
<script src="assets/index.js"></script>
</html>