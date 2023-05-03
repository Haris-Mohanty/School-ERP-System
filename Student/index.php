
<?php

require_once("../Common_files/php/database.php");

  session_start();
  $username = $_SESSION['username'];

  if(empty($username)){
    header("Location:../");
    exit;
  }
  $get_data = "SELECT * FROM students WHERE email = '$username'";

  $stu_res = $db -> query($get_data);
  $all_students_data = "";

  if($stu_res -> num_rows != 0){
    $all_students_data = $stu_res -> fetch_assoc();
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

    <!-- CSS FILE LINK START -->
    <link rel="stylesheet" href="stu.css" />
    <!-- CSS FILE LINK END -->
    <title>Employee</title>
    <link rel="shortcut icon" href="../Images/shortcut.jpg">
  </head>
  <body>
    <div class="container-fluid p-0">
      <div class="side-nav side-nav-open">
        <!-- student profile pic -->
        <div class="stu-profile" style="background-image: url(../Employee/<?php echo $all_students_data['photo'] ?>);">

        </div>
        <button class="btn w-100 text-light text-start institute-update-btn">
          <i class="fa-solid fa-chart-line"></i>
          <!-- Student name -->
          <?php echo $all_students_data['student_name']; ?>
          <i class="fa-solid fa-angle-down float-end mt-2"></i>
        </button>
        <ul class="collapse show institute-menu">
          <li class="border-start collapse-item p-2" access-link="">Invoice List</li>
          <li class="border-start collapse-item p-2" access-link="">Payment Mode</li>
          <li class="border-start collapse-item p-2" access-link="">Student Details</li>
        </ul>
      </div>
      <div class="page page-open">
        <?php 
        require_once("../Employee/php/nav.php") 
        ?>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4 p-4">
              <div class="card">
                <div class="card-header" style="background-color : #1ab393;">
                  <h3 class="text-center text-white">Student Dues</h3>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                  <div class="card-box d-flex align-items-center justify-content-center">
                    <h1 style="color: #30a891">4000</h1>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-md-4 p-4">
              <div class="card">
                <div class="card-header" style="background-color : #1ab393;">
                  <h3 class="text-center text-white">Student Paid</h3>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                  <div class="card-box d-flex align-items-center justify-content-center">
                    <h1 style="color: #30a891"><?php  ?></h1>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 p-4">
              <div class="card">
                <div class="card-header" style="background-color : #1ab393;">
                  <h3 class="text-center text-white">Student Attendance</h3>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                  <div class="card-box d-flex align-items-center justify-content-center">
                    <h1 style="color: #30a891">4000</h1>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 p-4">
              <div class="card">
                <div class="card-header" style="background-color : #1ab393;">
                  <h3 class="text-center text-white">Student Details</h3>
                </div>
                <div class="card-body">
                  <b>Name :- <strong>Haris Mohanty</strong></b><br><br>
                  <b>Course :- <strong>PHP</strong></b><br><br>
                  <b>Batch :- <strong>New Batch</strong></b><br><br>
                  <b>Enrollment :- <strong>785584</strong></b><br><br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <!-- JS FILE LINK START -->
  <!-- <script src="js/script.js"></script> -->
  <!-- JS FILE LINK END -->
</html>