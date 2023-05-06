<?php

// Database linked
require_once("../../Common_files/php/database.php");

echo '
<!-- CREATE INVOICE - CODE START -->
    <div class="container-fluid">
      <!-- ADD INVOICE - CODE START -->
      <div class="row mb-4">
        <div class="col-md-1"></div>
        <div class="col-md-10 bg-white shadow-sm mt-3 p-4">
          <h5 class="category-h5 mb-3">
            ADD INVOICE
            <i class="fa-solid fa-circle-notch fa-spin d-none invoice-loader float-end mt-1 text-danger" 
            style="font-size: 20px"></i>
          </h5>
          <hr />
          <form class="invoice-form">
            <div class="row">
              <div class="col-md-12">
                <label for="invoice-enrollment">Enter Enrollment No.</label>
                <span class="text-danger invoice-msg"></span>
                <input type="text" id="invoice-enrollment" class="form-control mb-3">
              </div>
            </div>
            <div class="row mb-3">
              <table class="table">.
                <thead>
                  <tr>
                    <th>Enrollment</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Course</th>
                    <th>Batch</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="text" name="invoice-enrollment" readonly class="form-control"></td>
                    <td><input type="text" name="invoice-name" readonly class="form-control"></td>
                    <td><input type="text" name="invoice-category" readonly class="form-control"></td>
                    <td><input type="text" name="invoice-course" readonly class="form-control"></td>
                    <td><input type="text" name="invoice-batch" readonly class="form-control"></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="row mb-3">
              <div class="col-md-2"></div>
              <div class="col-md-4">
                <div class="d-flex justify-content-between">
                  <h5>Total Fee </h5><span class="invoice-fee"></span>
                </div>
              </div>
              <div class="col-md-7"></div>
            </div>
            <div class="row mb-4">
              <div class="col-md-2"></div>
              <div class="col-md-4">
                <div class="d-flex justify-content-between">
                  <h5>Paid Fee </h5><span class="invoice-fee"></span>
                </div>
              </div>
              <div class="col-md-7"></div>
            </div>
            <table class="table mb-3">
              <thead>
                <tr>
                  <th class="text-nowrap">Fee Time</th>
                  <th class="text-nowrap">Fee Pending</th>
                  <th class="text-nowrap">Fee Payable</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="text" name="invoice-fee-time" readonly class="form-control"></td>
                  <td><input type="text" name="invoice-pending" readonly class="form-control"></td>
                  <td><input type="text" name="invoice-recent" placeholder="Enter the Fees" class="recent-paid form-control"></td>
                </tr>
              </tbody>
            </table>
            <button class="btn btn-primary float-end disabled invoice-btn">Add Invoice</button>
          </form>
        </div>
        <div class="col-md-1"></div>
      </div>
      <!-- ADD INVOICE - CODE END -->
      <!-- SHOW INVOICE - CODE START -->
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 bg-white p-4 shadow-sm">
          <h5 class="category-h5 mb-3">
            SHOW INVOICE
            <i class="fa-solid fa-circle-notch fa-spin invoice-list-loader float-end mt-1 text-danger" style="font-size: 20px"></i>
          </h5>
          <hr>
          <div class="row">
          <div class="col-md-6">
            <select name="select-category" id="invoice-list-category" class="form-select invoice-category mb-3">
               <option value="choose-category">Choose Category</option></select>
          </div>
          <div class="col-md-6">
              <select name="select-course" id="invoice-list-course" class="form-select mb-3">
                   <option value="choose-course">Choose Course</option>
              </select>
          </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <select name="select-batch" id="invoice-list-batch" class="form-select mb-3">
              <option value="choose-batch">Choose Batch</option>
              </select>
            </div>
           <div class="col-md-6">
              <input type="text" name="" placeholder="Search By Name" class="form-control">
           </div>
          </div>
            <div class="table-responsive">
              <table class="table table-stripped">
                <thead>
                  <tr>
                    <th class="text-nowrap">S/N</th>
                    <th class="text-nowrap">Category</th>
                    <th class="text-nowrap">Course</th>
                    <th class="text-nowrap">Batch</th>
                    <th class="text-nowrap">Enrollment</th>
                    <th class="text-nowrap">Name</th>
                    <th class="text-nowrap">Fee</th>
                    <th class="text-nowrap">Paid Fee</th>
                    <th class="text-nowrap">Recently Pay</th>
                    <th class="text-nowrap">Due Fee</th>
                    <th class="text-nowrap">Paid Date</th>
                    <th class="text-nowrap">Action</th>
                  </tr>
                </thead>
                <tbody class="invoice-list">
                  <tr>
                    <td>Haris</td>
                    <td>Haris</td>
                    <td>Haris</td>
                    <td>Haris</td>
                    <td>Haris</td>
                    <td>Haris</td>
                    <td>Haris</td>
                    <td>Haris</td>
                    <td>Haris</td>
                    <td>Haris</td>
                    <td>Haris</td>
                    <td>Haris</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
        <div class="col-md-1"></div>
      </div>
      <!-- SHOW INVOICE - CODE END -->
    </div>
 <!-- CREATE INVOICE - CODE END -->
';


?>