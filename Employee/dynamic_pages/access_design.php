<?php


//LINK DATABASE
require_once("../../Common_files/php/database.php");

// NAV LINK
require_once("../php/nav.php");


echo '
<!-- GIVE ACCESS LINK - CODE START -->
        <div class="container-fluid">    
          <div class="row mb-4">
            <div class="col-md-3"></div>
            <div class="col-md-6 bg-white shadow-sm mt-3 p-4">
              <h5 class="category-h5 mb-3">
                Give Access to Admins
                <i class="fa-solid fa-circle-notch fa-spin access-loader d-none float-end mt-1 text-danger" style="font-size: 20px"></i>
              </h5>
              <hr />
              <form class="access-form">

                <input type="email" class="form-control mb-3" placeholder="Username" required name="username">      
                <input type="password" class="form-control mb-3" placeholder="Password" required name="password">      
                <button class="btn btn-primary float-end access-btn mb-4">Give Access</button>
              </form>

              <table class="table mb-3">
                <thead>
                  <tr>
                    <th class="text-nowrap">S/N</th>
                    <th class="text-nowrap">Usename</th>
                    <th class="text-nowrap">Password</th>
                    <th class="text-nowrap">Action</th>
                  </tr>
                </thead>
                <tbody class="access-list">
                    
                </tbody>
              </table>

            </div>
            <div class="col-md-3"></div>
          </div>
      </div>
        <!-- GIVE ACCESS LINK - CODE END -->
';

?>