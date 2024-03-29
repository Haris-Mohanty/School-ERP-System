
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
  $_SESSION['mobile'] = $all_students_data['mobile'];
  $_SESSION['address'] = $all_students_data['city'];

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
          <li class="border-start collapse-item p-2" access-link="dashboard_design.php">Dashboard</li>
          <li class="border-start collapse-item p-2 active" access-link="invoice_design.php">Invoice List</li>
          <li class="border-start collapse-item p-2" access-link="payment_design">Payment Mode</li>
        </ul>
      </div>
      <div class="page page-open">
        
      </div>
    </div>
  </body>
  <!-- JS FILE LINK START -->
  <script src="js/student.js"></script>
  <!-- JS FILE LINK END -->
</html>