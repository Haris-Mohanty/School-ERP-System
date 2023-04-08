<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

// NAV LINK
require_once("../php/nav.php");

//choose category
$get_category = "SELECT * FROM category";

$response = $db -> query($get_category);

$all_category = [];

if($response){
  while($data = $response -> fetch_assoc()){
    array_push($all_category , $data['category_name']);
  }
}

$length = count($all_category);

echo '

<!-- STUDENT ATTENDANCE - CODE START -->
    <div class="container-fluid">    
      <div class="row mb-4">
        <div class="col-md-1"></div>
        <div class="col-md-10 bg-white shadow-sm mt-3 p-4">
          <h5 class="category-h5 mb-3">
            Student Attendance
            <i class="fa-solid fa-circle-notch fa-spin att-loader float-end mt-1 text-danger" style="font-size: 20px"></i>
          </h5>
          <hr />
          <form class="stu-att-form">

            <div class="row">
              <div class="col-md-4">
                <select name="select-category" id="att-category" class="form-select invoice-category mb-3">
                   <option value="choose-category">Choose Category</option>';

                   for($i=0; $i<$length; $i++){
                    echo '<option value="'.$all_category[$i].'">'.$all_category[$i].'</option>';
                  }

            echo '</select>
             </div>
              <div class="col-md-4">
                  <select name="select-course" id="att-course" class="form-select mb-3">
                       <option value="choose-course">Choose Course</option>
                  </select>
              </div>
              <div class="col-md-4">
                <select name="select-batch" id="att-batch" class="form-select mb-3">
                <option value="choose-batch">Choose Batch</option>
                </select>
              </div>
              </div>

              <input type="date" class="date form-control mb-3" max="2023-04-08">
                  
            <table class="table mb-3">
              <thead>
                <tr>
                  <th class="text-nowrap">S/N</th>
                  <th class="text-nowrap">Enrollment</th>
                  <th class="text-nowrap">Name</th>
                  <th class="text-nowrap">Batch</th>
                  <th class="text-nowrap">Attendance</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>102145</td>
                  <td>Haris</td>
                  <td>New Batch</td>
                  <td class="d-flex justify-content-between">
                    <div>
                      <input type="radio" name="absent" id="absent" value="absent" >
                      <label for="absent">Absent</label>
                    </div>
                    <div>
                      <input type="radio" name="abset" id="present" value="present" >
                      <label for="present">Present</label>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <button class="btn btn-primary float-end att-btn">Add Attendance</button>
          </form>
        </div>
        <div class="col-md-1"></div>
      </div>
 </div>
        <!-- STUDENT ATTENDANCE - CODE END -->

';

?>