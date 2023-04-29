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

    <!-- REGISTRATION CODE START -->
    <div class="container bg-white shadow-lg border p-4" style="margin-top:100px">
        <h2>CREATE AN ACCOUNT</h2>
        <hr>
        <div class="row">
            <div class="col-md-6">
               <form class="register-form">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control mb-3">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control mb-3">
                <label for="mobile">Mobile</label>
                <input type="text" id="mobile" class="form-control mb-3">
                <label for="description">Description</label>
                <textarea id="description" class="form-control mb-3"></textarea>
                <button class="btn btn-primary w-100 register-btn">Register Now</button>
               </form>
               <form class="verify-form d-none">
                    <div class="form-group">
                        <div class="btn-group border shadow-sm">
                            <button class="btn btn-light">
                                <input type="text" placeholder="Enter OTP here!" class="form-control otp">
                            </button>
                            <button class="btn btn-success m-1 border verify-btn">Verify</button>
                            <button class="btn btn-warning m-1 border resend-btn">Resend</button>
                        </div>
                    </div>
               </form>
            </div>

            <div class="col-md-1"></div>

            <div class="col-md-5 text-center mt-5">
                <h3>
                    I have already an Account!
                </h3>
                <a href="login.php" class="btn btn-success">Login</a>
            </div>
        </div>
    </div>
    <!-- REGISTRATION CODE END -->

    <!-- footer -->
    <?php require("assets/footer.php"); ?>
     
</body>
<script>
    $(document).ready(function(){
        $(".register-form").on("submit", function(e){
            e.preventDefault();
            //ajax
            $.ajax({
                type : "POST",
                url : "pages/php/register.php",
                data : new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function () {
                  $(".register-btn").html("Please Wait....");
                },
                success: function (response) {
                    alert(response);
                },
            });
        });
    });
</script>
<script src="assets/index.js"></script>
</html>