<?php

echo '

<!-- BRANDING DETAILS- CODE START -->
    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col-md-1"></div>
        <div class="col-md-10 bg-white shadow-sm mt-3 p-4">
          <h5 class="category-h5 mb-3">
            CREATE BRAND
            <i class="fa-solid fa-circle-notch fa-spin d-none brand-loader float-end mt-1 text-danger" 
            style="font-size: 20px"></i>
          </h5>
          <hr />

          <form class="brand-form">
            <div class="form-group mb-3">
              <label for="brand-name" class="fw-bold">Enter Brand Name :-</label>
              <input type="text" name="brand-name" id="brand-name" class="form-control">
            </div>

            <div class="form-group mb-3">
              <label for="brand-logo" class="fw-bold">Choose Brand Logo :-</label>
              <input type="file" name="brand-logo" id="brand-logo" class="form-control">
            </div>

            <div class="form-group mb-3">
              <label for="brand-domain" class="fw-bold">Enter Brand Domain :-</label>
              <input type="text" name="brand-domain" id="brand-domain" class="form-control">
            </div>

            <div class="form-group mb-3">
              <label for="brand-email" class="fw-bold">Enter Brand Email :-</label>
              <input type="email" name="brand-email" id="brand-email" class="form-control">
            </div>

            <div class="form-group mb-3">
              <label for="brand-twitter" class="fw-bold">Social Handles :-</label>
              <input type="url" placeholder="Twitter URL" name="brand-twitter" id="brand-twitter" class="form-control mb-3">
              <input type="url" placeholder="Facebook URL" name="brand-facebook" id="brand-facebook" class="form-control mb-3">
              <input type="url" placeholder="Instagram URL" name="brand-instagram" id="brand-instagram" class="form-control mb-3">
              <input type="url" placeholder="Whatsapp URL" name="brand-whatsapp" id="brand-whatsapp" class="form-control">
            </div>

            <div class="form-group mb-3">
              <label for="brand-address" class="fw-bold">Enter Brand Address :-</label>
              <textarea name="brand-address" id="brand-address" class="form-control"></textarea>
            </div>
            
            <div class="form-group mb-3">
              <label for="brand-mobile" class="fw-bold">Brand Mobile Number :-</label>
              <input type="number" name="brand-mobile" id="brand-mobile" class="form-control">
            </div>

            <div class="form-group mb-3">
              <label for="brand-about" class="fw-bold">About Us :-</label>
              <textarea name="brand-about" id="brand-about" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group mb-3">
              <label for="brand-privacy" class="fw-bold">Privacy Policy :-</label>
              <textarea name="brand-privacy" id="brand-privacy" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group mb-3">
              <label for="brand-cookie" class="fw-bold">Cookie Policy :-</label>
              <textarea name="brand-cookie" id="brand-cookie" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group mb-3">
              <label for="brand-terms" class="fw-bold">Terms & Conditions :-</label>
              <textarea name="brand-terms" id="brand-terms" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group mb-3">
              <button class="btn btn-primary w-100">Create Brand</button>
            </div>

          </form>
        </div>
        <div class="col-md-1"></div>
      </div>
    </div>
 <!-- BRANDING DETAILS- CODE END -->

';

?>