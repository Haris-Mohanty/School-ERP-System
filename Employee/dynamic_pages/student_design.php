<?php

echo '

<div class="container-fluid">
      <!-- STUDENT REGISTRATION FROM CODE START -->
      <div class="row mb-4">
        <div class="col-md-1"></div>
        <div class="col-md-10 bg-white shadow-sm mt-3 p-4">
          <h5 class="category-h5 mb-3">
            Student Registration From
            <i class="fa-solid fa-circle-notch fa-spin student-loader float-end mt-1 text-danger" style="font-size: 20px"></i>
          </h5>
          <hr />
          <!-- form start -->
          <form class="student-form">
            <div class="row">
              <div class="col-md-4">
                <select name="stu-category" id="stu-category" class="form-select mb-3">
                  <option value="choose-category">Choose Category</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="stu-course" id="stu-course" class="form-select mb-3">
                  <option value="choose-course">Choose Course</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="stu-batch" id="stu-batch" class="form-select mb-3">
                  <option value="choose-course">Choose Batch</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <input type="text" name="enrollment" placeholder="Enrollment No." class="form-control">
              </div>
              <div class="col-md-6">
                <input type="text" name="name" placeholder="Enter Name" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <div class="row">
                <div class="col-md-4">
                  <input type="number" name="day" placeholder="DD" class="form-control dd">
                </div>
                <div class="col-md-4">
                  <select name="month" class="form-select">
                    <option value="choose month">Month</option>
                    <option value="january">January</option>
                    <option value="february">February</option>
                    <option value="march">March</option>
                    <option value="april">April</option>
                    <option value="may">May</option>
                    <option value="june">June</option>
                    <option value="july">July</option>
                    <option value="august">August</option>
                    <option value="september">September</option>
                    <option value="october">October</option>
                    <option value="november">November</option>
                    <option value="december">December</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <input type="number" name="Year" placeholder="YY" class="form-control yy">
                </div>
                </div>
              </div>
              <div class="col-md-6">
                <select name="gender" class="form-select">
                  <option value="choose gender">Choose Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <input type="text" name="fathe" placeholder="Father Name" class="form-control">
              </div>
              <div class="col-md-6">
                <input type="text" name="mother" placeholder="Mother Name" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-4">
                <input type="email" name="email" placeholder="Email" class="form-control">
              </div>
              <div class="col-md-4">
                <input type="password" name="password" placeholder="Password" class="form-control">
              </div>
              <div class="col-md-4">
                <input type="number" name="mobile" placeholder="Mobile No." class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <input type="text" name="country" placeholder="Country" class="form-control">
              </div>
              <div class="col-md-6">
                <input type="text" name="state" placeholder="State" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <input type="text" name="city" placeholder="City" class="form-control">
              </div>
              <div class="col-md-6">
                <input type="number" name="pincode" placeholder="Pin Code" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <input type="number" readonly name="fee" placeholder="Fee" class="form-control">
              </div>
              <div class="col-md-6">
                <input type="text" readonly name="fee-time" placeholder="Fee-Time" class="form-control">
              </div>
            </div>
            <div class="row mb-1">
              <div class="col-md-6">
                <input type="checkbox" name="stu-active" id="stu-active">
                <label for="stu-active">Is Active</label>
              </div>
              <div class="col-md-6">
                <button class="btn btn-primary float-end btn-audiowide">Add Student</button>
              </div>
            </div>
          </form>
          <!-- form end -->
        </div>
        <div class="col-md-1"></div>
      </div>
      <!-- STUDENT REGISTRATION FROM CODE END -->
      
      <!--REGISTERED STUDENTS LIST CODE START  -->
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 bg-white p-4 shadow-sm">
          <h5 class="category-h5 mb-3">
            Registered Students List
            <i class="fa-solid fa-circle-notch fa-spin batch-list-loader d-none float-end mt-1 text-danger" style="font-size: 20px"></i>
          </h5>
          <hr>
          <div class="row">
          <div class="col-md-6">
            <select name="select-category" id="stu-list-category" class="form-select batch-category mb-3">
               <option value="choose-category">Choose Category</option>
            </select>
          </div>
          <div class="col-md-6">
              <select name="select-course" id="stu-list-course" class="form-select mb-3">
              <option value="choose-course">Choose Course</option>
              </select>
          </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <select name="select-batch" id="stu-list-batch" class="form-select mb-3">
              <option value="choose-course">Choose Batch</option>
              </select>
            </div>
           <div class="col-md-6">
              <input type="text" name="" placeholder="Search By Name" class="form-control">
           </div>
          </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-nowrap">S/N</th>
                    <th class="text-nowrap">Category</th>
                    <th class="text-nowrap">Course Name</th>
                    <th class="text-nowrap">Batch</th>
                    <th class="text-nowrap">Enrollment</th>
                    <th class="text-nowrap">Name</th>
                    <th class="text-nowrap">Father Name</th>
                    <th class="text-nowrap">Mother Name</th>
                    <th class="text-nowrap">DOB</th>
                    <th class="text-nowrap">Gender</th>
                    <th class="text-nowrap">Email</th>
                    <th class="text-nowrap">Password</th>
                    <th class="text-nowrap">Mobile</th>
                    <th class="text-nowrap">Country</th>
                    <th class="text-nowrap">State</th>
                    <th class="text-nowrap">City</th>
                    <th class="text-nowrap">PinCode</th>
                    <th class="text-nowrap">Fee</th>
                    <th class="text-nowrap">Fee-Time</th>
                    <th class="text-nowrap">Photo</th>
                    <th class="text-nowrap">Signature</th>
                    <th class="text-nowrap">Id Proof</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Added By</th>
                    <th class="text-nowrap">Added Date</th>
                    <th class="text-nowrap">Action</th>
                  </tr>
                </thead>
                <tbody class="stu-list">
                  
                </tbody>
              </table>
            </div>
        </div>
        <div class="col-md-1"></div>
      </div>
      <!--REGISTERED STUDENTS LIST CODE END  -->
 </div>

';


?>