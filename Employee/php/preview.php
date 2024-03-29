<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$file = $_FILES['photo'];
$location = $file['tmp_name'];
$image = "data:image/png;base64,".base64_encode(file_get_contents($location));

$data = json_decode($_POST['data']);
$text = $data[0];
$h_align = $data[1];
$v_align = $data[2];

   $text_align = "";
 
    if($h_align == "center")
    {
        $text_align = "text-center";
    }
    else if($h_align == "flex-start")
    {
        $text_align = "text-start";
    }
    else if($h_align == "flex-end")
    {
        $text_align = "text-start";
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP CSS LINK START -->
    <link rel="stylesheet" href="../Common_files/css/bootstrap.min.css" />
    <!-- BOOTSTRAP CSS LINK END -->

    <!-- BOOTSTRAP JS LINK START -->
    <script src="../Common_files/js/bootstrap.bundle.min.js"></script>
    <!-- BOOTSTRAP JS LINK END -->

    <!-- ANIMATE CSS LINK START -->
    <link rel="stylesheet" href="../Common_files/css/animate.min.css" />
    <!-- ANIMATE CSS LINK END -->

    <!-- SWEET ALERT JS LINK START -->
    <script src="../Common_files/js/sweetalert.min.js"></script>
    <!-- SWEET ALERT JS LINK END -->

    <!--FONT AWESOME LINK START -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!--FONT AWESOME LINK END -->

    <!-- JQUERY LINK START -->
    <script src="../Common_files/js/jquery.min.js"></script>
    <!-- JQUERY LINK END -->

    <!--   GOOGLE FONT START -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide"/>
    <!--   GOOGLE FONT END -->

    <title>Preview</title>
    <link rel="stylesheet" href="pages/index.css">
</head>
<body>
    
    <div class="container-fluid">
        <div class="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo $image; ?>" class="w-100" alt="">
                    <div class="carousel-caption <?php echo $text_align; ?> h-100 d-flex" style="justify-content: <?php echo $h_align; ?>; align-items: <?php echo $v_align; ?>">
                        <div>
                         <?php
                             echo $text;
                         ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>