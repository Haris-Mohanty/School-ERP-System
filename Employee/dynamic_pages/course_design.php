<?php

// NAV LINK
require_once("../php/nav.php");


echo '


<!-- CREATE COURSE CODE START -->
        <div class="container-fluid">
          <div class="row mb-4">
            <div class="col-md-1"></div>
            <div class="col-md-10 bg-white shadow-sm mt-3 p-4">

              <h5 class="category-h5 mb-3">
                CREATE COURSE
                <i class="fa-solid fa-circle-notch fa-spin float-end mt-1 text-danger" style="font-size: 20px"></i>
              </h5>
              <hr />


              <form>
                <select name="select-category" class="form-select mb-3">
                  <option value="choose-category">Choose Category</option>
                </select>


                <div class="row mb-3">
                  <div class="col-md-6">
                    <input type="text" name="course-code" placeholder="Course Code" class="form-control">
                  </div>

                  <div class="col-md-6">
                    <input type="text" name="course-name" placeholder="Course Name" class="form-control">
                  </div>
                </div>


                <textarea name="course-detail" class="form-control mb-3" placeholder="Course Details"></textarea>


                <div class="row mb-3">
                  <div class="col-md-6">
                    <input type="text" name="course-duration" placeholder="Course Duration" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <select name="course-time" class="form-select mb-3">
                      <option value="days">Days</option>
                      <option value="month">Month</option>
                      <option value="year">Year</option>
                    </select>
                  </div>
                </div>


                <div class="row mb-3">
                  <div class="col-md-6">
                    <input type="text" name="course-fee" placeholder="Course Fee" class="form-control">
                  </div>
                  <div class="col-md-6">

                    <select name="course-fee-time" class="form-select mb-3">
                      <option value="monthly">Monthly</option>
                      <option value="one-time">One Time</option>
                    </select>

                  </div>
                </div>


                <div class="row mb-3">
                  <div class="col-md-6">
                    <input type="file" name="course-logo" class="form-control">
                  </div>

                  <div class="col-md-6">
                    <input type="text" name="course-added-by" placeholder="Course Added By" class="form-control">
                  </div>
                </div>


                <div class="row mb-1">
                  <div class="col-md-6">
                    <input type="checkbox" name="course-active" id="course-active">
                    <label for="course-active">Is Active</label>
                  </div>
                  <div class="col-md-6">
                    <button class="btn btn-primary float-end btn-audiowide">Add Course</button>
                  </div>
                </div>


              </form>


            </div>
            <div class="col-md-1"></div>
          </div>
          <!-- COURSE LIST CODE START -->


          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 bg-white p-4 shadow-sm">
              <select name="select-category" class="form-select mb-3">
                <option value="choose-category">Choose Category</option>
              </select>
              <h5 class="category-h5 mb-3">
                COURSE LIST
                <i class="fa-solid fa-circle-notch fa-spin float-end mt-1 text-danger" style="font-size: 20px"></i>
              </h5>
              <hr>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th class="text-nowrap">S/N</th>
                        <th class="text-nowrap">Category</th>
                        <th class="text-nowrap">Course Code</th>
                        <th class="text-nowrap">Course Name</th>
                        <th class="text-nowrap">Duration</th>
                        <th class="text-nowrap">Total Time</th>
                        <th class="text-nowrap">Fees</th>
                        <th class="text-nowrap">Fees Period</th>
                        <th class="text-nowrap">Is-Active</th>
                        <th class="text-nowrap">Added Date</th>
                        <th class="text-nowrap">Added By</th>
                        <th class="text-nowrap">Course Details</th>
                        <th class="text-nowrap">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr> 
                        <td class="text-nowrap">1</td>
                        <td class="text-nowrap">MCA</td>
                        <td class="text-nowrap">12452</td>
                        <td class="text-nowrap">CSE</td>
                        <td class="text-nowrap">4</td>
                        <td class="text-nowrap">yr</td>
                        <td class="text-nowrap">4579</td>
                        <td class="text-nowrap">1-time</td>
                        <td class="text-nowrap">Active</td>
                        <td class="text-nowrap">12-05-2022</td>
                        <td class="text-nowrap">Haris Mohanty</td>
                        <td class="text-nowra">Lorem ipsum dolor sit, amet.</td>
                        <td class="text-nowrap">
                          <button class="btn btn-primary p-1 px-2"><i class="fa fa-edit"></i></button>
                          <button class="btn btn-danger p-1 px-2"><i class="fa fa-trash"></i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
            <div class="col-md-1"></div>
          </div>
          <!-- COURSE LIST CODE END -->


        </div>
        <!-- CREATE COURSE CODE END -->


';


?>