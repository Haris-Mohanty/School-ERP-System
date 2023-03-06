<?php
//show navbar
require_once("../php/nav.php");

echo '
<div class="row p-3">
          <!-- CREATE CATEGORY CODE START -->
          <div class="col-4 bg-white shadow-sm py-2">
            <h5 class="category-h5 mb-3 ">CREATE CATEGORY
              <i class="fa-solid fa-circle-notch fa-spin create-category-loader float-end mt-1 text-danger" style="font-size: 20px;"></i>
            </h5>
            <form class="category-form">
              <input type="text" name="category" placeholder="Category Name" class="form-control category mb-3 shadow-none">
              <textarea name="details" class="form-control details mb-3 shadow-none" placeholder="Enter Details"></textarea>
              <div align="end">
                <button class="btn btn-primary"><i class="fa fa-plus"></i>Add Fields</button>
                <button class="btn btn-danger">Create</button>
              </div>
            </form>
          </div>
          <!-- CREATE CATEGORY CODE END -->
          <!-- CATEGORY LIST SHOW CODE START -->
          <div class="col-2"></div>
          <div class="col-6 bg-white shadow-sm py-2">
            <h5 class="category-h5 mb-3 ">CATEGORY LIST
              <i class="fa-solid fa-circle-notch fa-spin create-category-loader float-end mt-1 text-danger" style="font-size: 20px;"></i>
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
              <tbody>
                <tr>
                  <td>1</td>
                  <td>MCA</td>
                  <td>Lorem, ipsum dolor.</td>
                  <td>
                    <button type="button" class="btn btn-primary category-add-btn p-1 px-2"><i class="fa fa-edit"></i></button>
                    <button type="submit" class="btn btn-danger category-create-btn p-1 px-2"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- CATEGORY LIST SHOW CODE END -->
        </div>
';

?>