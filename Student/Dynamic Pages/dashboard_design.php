<?php

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