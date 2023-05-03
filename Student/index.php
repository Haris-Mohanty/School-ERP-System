
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

//Get Total Attendance
  $enrollment = $all_students_data['enrollment'];

  $all_att = [];

  $get_att = "SELECT * FROM attendance WHERE enrollment = '$enrollment'";
  $att_response = $db -> query($get_att);

  if($att_response){
    while($data = $att_response -> fetch_assoc())
    {
      array_push($all_att, $data);
    }
  }
  $att_length = count($all_att);


//Get Total Present
  $all_pres = [];

  $get_pres = "SELECT * FROM attendance WHERE enrollment = '$enrollment' AND attendance = 'present'";
  $pres_response = $db -> query($get_pres);

  if($pres_response){
    while($pres_data = $pres_response -> fetch_assoc())
    {
      array_push($all_pres, $pres_data);
    }
  }
  $pres_length = count($all_pres);

  $percentage = $pres_length*100/$att_length;

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
    
  </body>
  <!-- JS FILE LINK START -->
  <!-- <script src="js/script.js"></script> -->
  <!-- JS FILE LINK END -->
</html>