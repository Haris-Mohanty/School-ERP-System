<!-- FOOTER CODE START -->
<div class="container" style="margin-top: 100px;">
            <div class="row">
                <div class="col-md-6 mb-2 d-flex justify-content-center align-items-center">
                    <div class="input-group w-100">
                        <input type="email" name="" placeholder="email@gmail.com" id="" class="form-control">
                        <span class="input-group-text" style="cursor: pointer;">Subscribe</span>
                    </div>
                </div>
                <div class="col-md-6 mb-2 d-flex justify-content-center align-items-center">
                    <div class="btn-group">
                        <button class="btn btn-dark">FOLLOW US</button>
                        <button class="btn border"> <a href="#"> <i class="fa-brands fa-twitter"></i> </a> </button>
                        <button class="btn border"> <a href="#"> <i class="fa-brands fa-facebook"></i> </a> </button>
                        <button class="btn border"> <a href="#"> <i class="fa-brands fa-instagram"></i> </a> </button>
                        <button class="btn border"> <a href="#"> <i class="fa-brands fa-youtube"></i> </a> </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fuild bg-dark p-4">
            <div class="row">
                <div class="col-md-3"><h4 class="text-white">CATEGORY</h4>
                    <?php
                        $get_menu = "SELECT * FROM category";
                        $cat_res = $db -> query($get_menu);
                        if($cat_res){
                            while($data = $cat_res -> fetch_assoc()){
                                echo '
                                  <a href="#" class="nav-link text-white">'.$data['category_name'].'</a>';
                            }
                        }
                    ?>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                <h4 class="text-white">POLICIES</h4>
                    <ul class="list-group">
                        <li class="list-group-item text-white bg-transparent" style="cursor: pointer;">Privacy Policy</li>
                        <li class="list-group-item text-white bg-transparent" style="cursor: pointer;">Cookie Policy</li>
                        <li class="list-group-item text-white bg-transparent" style="cursor: pointer;">Terms & Conditions</li>
                        <li class="list-group-item text-white bg-transparent" style="cursor: pointer;">About Us</li>
                    </ul>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4 mb-3">
                <h4 class="text-white">CONTACT</h4>
                    <p class="text-white py-2"> <b>Venue</b>: <?php echo $brand_res['brand_address']?> </p>
                    <p class="text-white py-2"> <b>Call us</b>: </p>
                    <p class="text-white py-2"> <b>Email</b>: </p>
                    <p class="text-white py-2"> <b>Website</b>: </p>
                </div>
            </div>
        </div>
    <!-- FOOTER CODE END -->