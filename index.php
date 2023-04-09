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

    <title>School ERP System</title>
</head>
<body>
    <?php
    
    $brand_res = "";
    $get_brand = "SELECT * FROM branding";
    $response = $db -> query($get_brand);
    if($response){
        $brand_res = $response -> fetch_assoc();
    }

    ?>
    <div class="bg-light shadow-sm container-fluid">
        <!-- NAV BAR - CODE START -->
        <nav class="navbar navbar-expand-sm fixed-top shadow-lg navbar-light">
            <div class="container">
                <a href="#" class="navbar-brand text-uppercase border">
                    <?php
                    $logo_string = base64_encode($brand_res['brand_logo']);
                    $src = "data:image/png;base64,".$logo_string;

                    echo "<img src='".$src."' width='40'>";
                    echo "&nbsp";
                    echo "<small>".$brand_res['brand_name']."</small>";
                    ?>
                </a>
                <button class="navbar-toggler" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="myNavbar">
                    <ul class="navbar-nav">
                        <?php
                        
                        $get_menu = "SELECT * FROM category";
                        $cat_res = $db -> query($get_menu);
                        if($cat_res){
                            while($data = $cat_res -> fetch_assoc()){
                                echo '
                                <li class="nav-item">
                                  <a href="" class="nav-link"></a>
                                </li>
                                ';
                            }
                        }

                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- NAV BAR - CODE END -->
    </div>
</body>
</html>