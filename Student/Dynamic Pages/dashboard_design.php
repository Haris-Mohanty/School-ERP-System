<?php

echo '

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
          <li class="border-start collapse-item p-2" access-link="">Invoice List</li>
          <li class="border-start collapse-item p-2" access-link="">Payment Mode</li>
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
                  <h3 class="text-center text-white">Student Dues<small>(Rem..)</small></h3>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                  <div class="card-box d-flex align-items-center justify-content-center">
                    <h1 style="color: #30a891"><?php echo $all_students_data['fee'] - $all_students_data['paid_fee']; ?></h1>
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
                    <h1 style="color: #30a891"><?php echo $all_students_data['paid_fee']; ?></h1>
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
                    <h1 style="color: #30a891"><?php echo $percentage. "%"; ?></h1>
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
                  <b>Name :- <strong><?php echo $all_students_data['student_name']; ?></strong></b><br><br>
                  <b>Course :- <strong><?php echo $all_students_data['course']; ?></strong></b><br><br>
                  <b>Batch :- <strong><?php echo $all_students_data['batch']; ?></strong></b><br><br>
                  <b>Enrollment :- <strong><?php echo $all_students_data['enrollment']; ?></strong></b><br><br>
                  <b>Total Fees :- <strong><?php echo $all_students_data['fee']; ?></strong></b><br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

';

?>