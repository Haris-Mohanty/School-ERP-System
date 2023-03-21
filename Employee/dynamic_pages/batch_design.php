<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

// NAV LINK
require_once("../php/nav.php");

//CHOOSE CATEGORY
$get_category = "SELECT * FROM category";

$response = $db -> query($get_category);
$all_category = [];
if($response){
    while($data = $response -> fetch_assoc()){
        array_push($all_category, $data['category_name']); //column name
    }
}

$length = count($all_category);

echo '

<!-- CREATE BATCH CODE START -->
    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col-md-1"></div>
        <div class="col-md-10 bg-white shadow-sm mt-3 p-4">
          <h5 class="category-h5 mb-3">
            CREATE BATCH
            <i class="fa-solid fa-circle-notch fa-spin batch-loader d-none float-end mt-1 text-danger" style="font-size: 20px"></i>
          </h5>
          <hr />
          <form class="batch-form">
            <div class="row">
              <div class="col-md-6">
                <select name="batch-category" id="batch-category" class="form-select mb-3">
                  <option value="choose-category">Choose Category</option>';

                  for($i=0; $i<$length; $i++){
                   echo '<option value="'.$all_category[$i].'">'.$all_category[$i].'</option>';
                  }

               echo '</select>
              </div>
              <div class="col-md-6">
                <select name="batch-course" id="batch-course" class="form-select mb-3">
                  <option value="choose-course">Choose Course</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <input type="text" name="batch-code" placeholder="Batch Code" class="form-control">
              </div>
              <div class="col-md-6">
                <input type="text" name="batch-name" placeholder="Batch Name" class="form-control">
              </div>
            </div>
            <textarea name="batch-detail" class="form-control mb-3" placeholder="Batch Details"></textarea>
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="batch-from">Batch From</label>
                <input type="time" id="batch-from" name="batch-from" class="form-control">
              </div>
              <div class="col-md-6">
                <label for="batch-to">Batch To</label>
                <input type="time" id="batch-to" name="batch-to" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="batch-from-date">Starting Date</label>
                <input type="date" id="batch-from-date" name="batch-from-date" class="form-control">
              </div>
              <div class="col-md-6">
                <label for="batch-to-date">Ending Date</label>
                <input type="date" id="batch-to-date" name="batch-to-date" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <input type="file" name="batch-logo" class="form-control">
              </div>
              <div class="col-md-6">
                <input type="text" name="batch-added-by" placeholder="Batch Added By" class="form-control">
              </div>
            </div>
            <div class="row mb-1">
              <div class="col-md-6">
                <input type="checkbox" name="batch-active" id="batch-active">
                <label for="batch-active">Is Active</label>
              </div>
              <div class="col-md-6">
                <button class="btn btn-primary float-end btn-audiowide">Add Batch</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-1"></div>
      </div>
      <!-- CREATE BATCH CODE END -->
    


      <!-- SHOW BATCH LIST CODE START -->
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 bg-white p-4 shadow-sm">
          <div class="row">
          <div class="col-md-6">
             <select name="select-category" id="batch-list-category" class="form-select batch-category mb-3">
               <option value="choose-category">Choose Category</option>';
   
               for($i=0; $i<$length; $i++){
                   echo '<option value="'.$all_category[$i].'">'.$all_category[$i].'</option>';
               }

               echo '</select>
         </div>
          <div class="col-md-6">
              <select name="batch-course" id="batch-list-course" class="form-select mb-3">
              <option value="choose-course">Choose Course</option>
              </select>
          </div>
          </div>
          <h5 class="category-h5 mb-3">
            BATCH LIST
            <i class="fa-solid fa-circle-notch fa-spin batch-list-loader d-none float-end mt-1 text-danger" style="font-size: 20px"></i>
          </h5>
          <hr>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-nowrap">S/N</th>
                    <th class="text-nowrap">Category</th>
                    <th class="text-nowrap">Course Code</th>
                    <th class="text-nowrap">Batch Code</th>
                    <th class="text-nowrap">Batch Name</th>
                    <th class="text-nowrap">Start Time</th>
                    <th class="text-nowrap">End Time</th>
                    <th class="text-nowrap">Start Date</th>
                    <th class="text-nowrap">End Date</th>
                    <th class="text-nowrap">Is-Active</th>
                    <th class="text-nowrap">Added By</th>
                    <th class="text-nowrap">Batch Details</th>
                    <th class="text-nowrap">Added Date</th>
                    <th class="text-nowrap">Action</th>
                  </tr>
                </thead>
                <tbody class="course-list">
                  <tr>
                    <td class="text-nowrap">Haris</td>
                    <td class="text-nowrap">Haris</td>
                    <td class="text-nowrap">Haris</td>
                    <td class="text-nowrap">Haris</td>
                    <td class="text-nowrap">Haris</td>
                    <td class="text-nowrap">Haris</td>
                    <td class="text-nowrap">Haris</td>
                    <td class="text-nowrap">Haris</td>
                    <td class="text-nowrap">Haris</td>
                    <td class="text-nowrap">Haris</td>
                    <td class="text-nowrap">Haris</td>
                    <td class="text-nowrap">Haris</td>
                    <td class="text-nowrap">Haris</td>
                    <td class="text-nowrap">Haris</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
        <div class="col-md-1"></div>
      </div>
    </div>
    <!-- SHOW BATCH LIST CODE END -->

';

?>