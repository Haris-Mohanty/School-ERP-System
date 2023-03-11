<?php
//show navbar
require_once("../php/nav.php");

echo '
<div class="row p-3">
          <!-- CREATE CATEGORY CODE START -->
          <div class="col-4 bg-white shadow-sm py-2">
            <h5 class="category-h5 mb-3 ">CREATE CATEGORY
              <i class="fa-solid fa-circle-notch fa-spin create-category-loader d-none float-end mt-1 text-danger" style="font-size: 20px;"></i>
            </h5>
            <form class="category-form">
              <input type="text" name="category" placeholder="Category Name" class="form-control category mb-3 shadow-none">
              <textarea name="details" class="form-control details mb-3 shadow-none" placeholder="Enter Details"></textarea>
              <div class="dynamic-fields">
              
              </div>
              <div align="end">
                <button type="button" class="btn btn-primary category-add-btn"><i class="fa fa-plus"></i>Add Fields</button>
                <button type="submit" class="btn btn-danger category-create-btn">Create</button>
              </div>
            </form>
          </div>
          <!-- CREATE CATEGORY CODE END -->
          
          <!-- CATEGORY LIST SHOW CODE START -->
          <div class="col-2"></div>
          <div class="col-6 bg-white shadow-sm py-2">
            <h5 class="category-h5 mb-3 ">CATEGORY LIST
              <i class="fa-solid fa-circle-notch fa-spin d-none show-category-loader float-end mt-1 text-danger" style="font-size: 20px;"></i>
            </h5>
            <hr>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Category Name</th>
                  <th>Category Details</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="category-list">
                
              </tbody>
            </table>
          </div>
          <!-- CATEGORY LIST SHOW CODE END -->
        </div>
';

?>