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
    <link rel="stylesheet" href="pages/index.css">
</head>
<body>
    <!-- nav -->
    <?php
        require("assets/nav.php");
    ?>

    <!-- Main Page code start -->
  <div class="container-fluid" style="margin-top: 90px;">
  <!-- CAROUSAL CODE START -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
       <div class="carousel-inner">
         <div class="carousel-item active">
           <img class="d-block w-100" src="Images/mitt.png" alt="First slide">
         </div>
         <div class="carousel-item">
           <img class="d-block w-100" src="Images/mc2.png" alt="Second slide">
         </div>
         <div class="carousel-item">
           <img class="d-block w-100" src="Images/buss.jpg" alt="Third slide">
         </div>
       </div>
       <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
       </a>
       <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
       </a>
    </div>
  <!-- CAROUSAL CODE END -->


  <!-- COURSE SECTION CODE START-->
   <div class="course-section">
    <div class="container">
      <h1 class="mt-5 fw-bold mb-4">Trending Courses</h1>
      <div class="row mb-5">
        <?php
         $get_course = "SELECT * FROM course";
         $course_res = $db -> query($get_course);
         if($course_res){
          while($data = $course_res -> fetch_assoc()){
            echo '
            <div class="col-md-3 p-0 mb-3 course-box">
            <div class="card">
              <img src="Employee/'.$data['logo'].'" class="card-img-top" alt="">
              <div class="card-body">
                <h4 class="card-title">
                  '.$data['name'].'
                </h4>
                <p class="card-text fw-bold">'.$data['fee'].'</p>
              </div>
            </div>
          </div>
            ';
          }
         }
        ?>
      </div>
    </div>
   </div>
  <!-- COURSE SECTION CODE END-->
  </div>
    <!-- Main Page code end -->

    <!-- footer -->
    <?php require("assets/footer.php"); ?>
    
     
</body>
</html>