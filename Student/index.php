
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
    <link rel="stylesheet" href="../Employee/css/style.css" />
    <!-- CSS FILE LINK END -->
    <title>Employee</title>
    <link rel="shortcut icon" href="../Images/shortcut.jpg">
  </head>
  <body>
    <div class="container-fluid p-0">
      <div class="side-nav side-nav-open">
        <!-- student profile pic -->
        <div class="stu-profile">
          
        </div>
        <button class="btn w-100 text-light text-start institute-update-btn">
          <i class="fa-solid fa-chart-line"></i>
          <!-- Student name -->
          <?php echo $all_students_data['student_name']; ?>
          <i class="fa-solid fa-angle-down float-end mt-2"></i>
        </button>
        <ul class="collapse show institute-menu">
          <li class="border-start collapse-item p-2" access-link="branding_design.php">Branding Details</li>
          <li class="border-start collapse-item p-2" access-link="category_design.php">Create Category</li>
          <li class="border-start collapse-item p-2" access-link="course_design.php">Create Course</li>
          <li class="border-start collapse-item p-2" access-link="batch_design.php">Create Batch</li>
          <li class="border-start collapse-item p-2" access-link="student_design.php">Student Registration</li>
          <li class="border-start collapse-item p-2" access-link="document_design.php">Upload Student Document</li>
          <li class="border-start collapse-item p-2" access-link="invoice_design.php">Create Invoice</li>
          <li class="border-start collapse-item p-2" access-link="attendance_design.php">Student Attendance</li>
          <li class="border-start collapse-item p-2 active" access-link="access_design.php">Give Access Link</li>
        </ul>
      </div>
      <div class="page page-open">
        <?php require_once("../Employee/php/nav.php") ?>
      </div>
    </div>
  </body>
  <!-- JS FILE LINK START -->
  <script src="js/script.js"></script>
  <!-- JS FILE LINK END -->
</html>