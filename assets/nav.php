<?php
    
    $brand_res = "";
    $get_brand = "SELECT * FROM branding";
    $response = $db -> query($get_brand);
    if($response){
        $brand_res = $response -> fetch_assoc();
    }

    ?>
    <div class="bg-light shadow-sm container-fluid">
        <!-- NAV BAR - CODE START -->
        <nav class="navbar navbar-expand-sm fixed-top shadow-lg navbar-light bg-white">
            <div class="container">
                <a href="https://www.mit.edu/" class="navbar-brand text-uppercase border">
                    <?php
                    $logo_string = base64_encode($brand_res['brand_logo']);
                    $src = "data:image/png;base64,".$logo_string;

                    echo "<img src='".$src."' width='40'>";
                    echo "&nbsp";
                    echo "<small class='fw-bold'>".$brand_res['brand_name']."</small>";
                    ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="myNavbar">
                    <ul class="navbar-nav w-100 justify-content-end">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="aboutus.php" class="nav-link">About</a>
                        </li>
                        <?php
                        
                        $get_menu = "SELECT * FROM category";
                        $cat_res = $db -> query($get_menu);
                        if($cat_res){
                            while($data = $cat_res -> fetch_assoc()){
                                echo '
                                <li class="nav-item">
                                  <a href="#" class="nav-link">'.$data['category_name'].'</a>
                                </li>
                                ';
                            }
                        }

                        ?>
                        <!-- Create and login code start -->
                        <div class="dropdown btn-group shadow-sm ml-auto">
                            <button class="btn">
                                <i class="fa fa-user" data-bs-toggle="dropdown"></i>
                                <div class="dropdown-menu">
                                    <a href="register.php" class="dropdown-item">
                                        <i class="fa fa-user"></i>
                                        Register
                                    </a>
                                    <a href="login.php" class="dropdown-item">
                                        <i class="fa fa-sign-in"></i>
                                        Login
                                    </a>
                                </div>
                            </button>
                        </div>
                        <!-- Create and login code end -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- NAV BAR - CODE END -->
    </div>