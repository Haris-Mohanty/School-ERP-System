<?php

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


echo '

<div class="container-fluid">
          <div class="row">
            <div class="col-md-4 p-4">
              <div class="card">
                <div class="card-header" style="background-color : #1ab393;">
                  <h3 class="text-center text-white">Student Dues<small>(Rem..)</small></h3>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                  <div class="card-box d-flex align-items-center justify-content-center">
                    <h1 style="color: #30a891">'?> <?php echo $all_students_data['fee'] - $all_students_data['paid_fee']; echo '</h1>
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
                    <h1 style="color: #30a891">'; ?> <?php echo $all_students_data['paid_fee']; echo '</h1>
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
                    <h1 style="color: #30a891">'?> <?php echo $percentage. "%"; echo '</h1>
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
                  <b>Name :- <strong>'; ?> <?php echo $all_students_data['student_name']; echo '</strong></b><br><br>
                  <b>Course :- <strong>'; ?> <?php echo $all_students_data['course']; echo '</strong></b><br><br>
                  <b>Batch :- <strong>'; ?> <?php echo $all_students_data['batch']; echo '</strong></b><br><br>
                  <b>Enrollment :- <strong>'; ?><?php echo $all_students_data['enrollment']; echo '</strong></b><br><br>
                  <b>Total Fees :- <strong>'; ?> <?php echo $all_students_data['fee']; echo '</strong></b><br>
                </div>
              </div>
            </div>
          </div>
        </div>

';

?>