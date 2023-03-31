<?php

// NAV LINK
require_once("../php/nav.php");

echo '

<!-- UPLOAD STUDENT DOCUMENT - CODE START -->
    <div class="container-fluid">
      <div class="row mb-5">
        <div class="col-md-1"></div>
        <div class="col-md-10 bg-white shadow-sm mt-3 p-4">
          <h5 class="category-h5 mb-3">ADD DOCUMENT
            <i class="fa-solid fa-circle-notch fa-spin document-loader d-none float-end mt-1 text-danger" style="font-size: 20px"></i>
          </h5>
          <hr>

          <form class="document-form">
            <div class="row mb-3">
              <div class="col-md-8">
                <label for="stu-enrollment" class="fw-bold">Student Enrollment</label>
                <span class="text-danger enroll-doc-msg"></span>
                <input type="text" name="enrollment" id="stu-enrollment" class="form-control mb-3">
                <label for="stu-photo" class="fw-bold">Upload Passport Size Photo</label>
                <input type="file" required name="photo" id="stu-photo" class="form-control mb-3">
              </div>
              <div class="col-md-4 d-flex justify-content-center align-items-center">
                <img src="Photo/avtar.png" width="150" height="150" alt="Profile Pic">
              </div>
            </div>

            <div class="row">
              <div class="col-md-8">
                <label for="stu-signature" class="fw-bold">Upload Signature</label>
                <input type="file" required name="signature" id="stu-signature" class="form-control mb-3">
                <label for="stu-id" class="fw-bold">Upload ID Proof In PDF Form</label>
                <input type="file" required name="id-proof" id="stu-id" class="form-control mb-3">
              </div>
              <div class="col-md-4 d-flex justify-content-center align-items-center">
                <img src="Signature/NapoleonSignature2_1050x700.webp" width="150" height="150" alt="Profile Pic">
              </div>
            </div>

            <!-- button -->
            <button class="btn btn-primary disabled doc-btn w-100">Upload Document</button>
          </form>
        </div>
        <div class="col-md-1"></div>
      </div>
    </div>
<!-- UPLOAD STUDENT DOCUMENT - CODE END -->

';

?>