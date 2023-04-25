
<?php

  require("../Common_files/php/database.php");

  session_start();
  $username = $_SESSION['username'];

  if(empty($username)){
    header("Location:../");
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- BOOTSTRAP CSS LINK START -->
    <link rel="stylesheet" href="../Common_files/css/bootstrap.min.css" />
    <!-- BOOTSTRAP CSS LINK END -->

    <!-- BOOTSTRAP JS LINK START -->
    <script src="../Common_files/js/bootstrap.bundle.min.js"></script>
    <!-- BOOTSTRAP JS LINK END -->

    <!-- ANIMATE CSS LINK START -->
    <link rel="stylesheet" href="../Common_files/css/animate.min.css" />
    <!-- ANIMATE CSS LINK END -->

    <!-- SWEET ALERT JS LINK START -->
    <script src="../Common_files/js/sweetalert.min.js"></script>
    <!-- SWEET ALERT JS LINK END -->

    <!--FONT AWESOME LINK START -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!--FONT AWESOME LINK END -->

    <!-- JQUERY LINK START -->
    <script src="../Common_files/js/jquery.min.js"></script>
    <!-- JQUERY LINK END -->

    <!--   GOOGLE FONT START -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide"/>
    <!--   GOOGLE FONT END -->

    <!-- CSS FILE LINK START -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- CSS FILE LINK END -->
    <title>Employee</title>
    <link rel="shortcut icon" href="../Images/shortcut.jpg">
  </head>
  <body>
    <div class="container-fluid p-0">
      <div class="side-nav side-nav-open">

        <!-- HOME PAGE DESIGN - CODE START -->
        <button class="btn w-100 text-light text-start homepage-update-btn">
          <i class="fa fa-home"></i>
          Homepage Design
          <i class="fa-solid fa-angle-down float-end mt-2"></i>
        </button>

        <ul class="collapse show homepage-menu">
          <li class="border-start collapse-item p-2" access-link="branding_design.php">Header Showcase</li>
          <li class="border-start collapse-item p-2" access-link="category_design.php">Category Showcase</li>
        </ul>
        <!-- HOME PAGE DESIGN - CODE END -->

        <!-- INSTITUTE UPDATE - CODE START -->
        <button class="btn w-100 text-light text-start institute-update-btn">
          <i class="fa-solid fa-chart-line"></i>
          Institute Update
          <i class="fa-solid fa-angle-down float-end mt-2"></i>
        </button>

        <ul class="collapse show institute-menu">
          <li class="border-start collapse-item p-2" access-link="branding_design.php">Branding Details</li>
          <li class="border-start collapse-item p-2" access-link="category_design.php">Create Category</li>
          <li class="border-start collapse-item p-2" access-link="course_design.php">Create Course</li>
          <li class="border-start collapse-item p-2" access-link="batch_design.php">Create Batch</li>
          <li class="border-start collapse-item p-2" access-link="student_design.php">Student Registration</li>
          <li class="border-start collapse-item p-2" access-link="document_design.php">Upload Student Document</li>
          <li class="border-start collapse-item p-2" access-link="invoice_design.php">Create Invoice</li>
          <li class="border-start collapse-item p-2" access-link="attendance_design.php">Student Attendance</li>
          <li class="border-start collapse-item p-2 active" access-link="access_design.php">Give Access Link</li>
        </ul>
        <!-- INSTITUTE UPDATE - CODE END -->
      </div>
      <div class="page page-open">
        <div class="container-fluid">
          <div class="row p-3">
            <div class="col-md-4 p-4 bg-white rounded-lg shadow-lg">
              <form class="header-showcase-form">
                <div class="form-group mb-3">
                  <label for="title-image" class="fw-bold">Title Image </label> <span> 200kb (1920*978)</span>
                  <input type="file" required name="title-image" id="title-image" class="form-control">
                </div>

                <div class="form-group mb-3">
                  <label for="title-text" class="fw-bold">Title Text </label><span class="title-limit"> 0</span><span>/40</span>
                  <textarea name="title-text" required id="title-text" maxlength="40" class="form-control" rows="2"></textarea>
                </div>

                <div class="form-group mb-3">
                  <label for="subtitle-text" class="fw-bold">Sub-Title Text</label><span class="subtitle-limit"> 0</span><span>/100</span>
                  <textarea name="subtitle-text" id="subtitle-text" maxlength="100" class="form-control" rows="3.5"></textarea>
                </div>

                <div class="form-group my-3">
                  <label for="create-button">Create Buttons</label>
                  <div class="input-group">
                    <input type="url" name="btn-url" placeholder="Enter the Url" class="form-control btn-url">
                    <input type="text" name="btn-name" placeholder="Button 1" class="form-control btn-name">
                  </div>
                </div>

                <div class="input-group my-3">
                  <div class="input-group">
                    <span class="input-group-text">BG COLOR</span>
                    <input type="color" name="btn-bgcolor" class="form-control btn-bgcolor p-1">
                    <span class="input-group-text">COLOR</span>
                    <input type="color" name="btn-textcolor" class="form-control btn-textcolor p-1">
                  </div>
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text">Size</span>
                  <select name="font-size" id="" class="font-size form-select">
                    <option value="16px">Small</option>
                    <option value="20px">Medium</option>
                    <option value="24px">Large</option>
                  </select>
                  <span class="add-btn btn btn-danger">Add</span>
                </div>

                <div class="form-group mb-3">
                  <button class="btn btn-primary py-2">Add Showcase</button>
                  <button type="button" class="btn btn-success float-end preview-btn w-50 py-2">Preview</button>
                </div>

                <div class="form-group">
                  <label for="edit-title">Edit Showcase</label>
                  <select id="edit-title" class="form-select">
                    <option value="choose title">Choose Title</option>
                    <?php
                      $get_data = "SELECT * FROM header_showcase";

                      $response = $db -> query($get_data);
                      $count = 0;


                      if($response)
                      {
                        while($data = $response -> fetch_assoc())
                        {
                          $count += 1;
                          echo '
                            <option value='.$data['id'].'>'.$count.'</option>
                          ';
                        }
                      }
                    ?>
                  </select>
                </div>

              </form>
            </div>

            <div class="col-md-1"></div>

            <div class="col-md-7 d-flex p-4 bg-white rounded-lg shadow-lg position-relative showcase-preview">
              <div class="title-box">
                <h1 class="showcase-title target fw-bold">TITLE</h1>
                <h4 class="showcase-subtitle target fw-bold">SUB TITLE</h4>
                <!-- add button -->
                <div class="title-buttons">

                </div>
              </div>
              <div class="showcase-formatting d-flex justify-content-around align-items-center">
                
                <!-- Color -->
                <div class="btn-group">
                  <button class="btn btn-light">Color</button>
                  <button class="btn btn-light">
                    <input type="color" name="color-selector" id="" class="color-selector">
                  </button>
                </div>

                <!-- Font Size -->
                <div class="btn-group">
                  <button class="btn btn-light">Font Size</button>
                  <button class="btn btn-light">
                    <input type="range" min="100" max="500" name="font-size" id="" class="font-size form-control">
                  </button>
                </div>

                <!-- Align -->
                <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">Alignment
                  <div class="dropdown-menu">
                    <span class="dropdown-item alignment" align-position="h" align-value="flex-start">Left</span>
                    <span class="dropdown-item alignment" align-position="h" align-value="center">Center</span>
                    <span class="dropdown-item alignment" align-position="h" align-value="flex-end">Right</span>
                    <span class="dropdown-item alignment" align-position="v" align-value="flex-start">Top</span>
                    <span class="dropdown-item alignment" align-position="v" align-value="center">V-Center</span>
                    <span class="dropdown-item alignment" align-position="v" align-value="flex-end">Buttom</span>
                  </div>
                </button>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>
    $(document).ready(function(){
      
      $(".target").each(function(){
        $(this).click(function(e){
          let element = e.target;
          let index_number = $(element).index();
          sessionStorage.setItem("color-index-number", index_number);

          let i;
          for(i=0; i<$(".target").length; i++){
            $(".target").css({
              border : "",
              boxShadow : "",
              padding : "",
              width : ""
            });
          }

          $(this).css({
            border : "4px solid red",
            boxShadow : "0px opx 3px grey",
            padding : "2px",
            width : "fit-content"
          });

          $(this).on("dblclick", function(){
            let i;
          for(i=0; i<$(".target").length; i++){
            $(".target").css({
              border : "",
              boxShadow : "",
              padding : "",
              width : ""
            });
          }
          });

          // Color Change
          $(".color-selector").on("input", function(){
            let color = this.value;
            let in_number = +sessionStorage.getItem("color-index-number");
            let element = document.getElementsByClassName("target")[in_number];
            element.style.color = color;
          });

          // Control Font size
          $(".font-size").on("input", function(){
            let size = this.value;
            let in_number = +sessionStorage.getItem("color-index-number");
            let element = document.getElementsByClassName("target")[in_number];
            element.style.fontSize = size+"%";
          });

        });
      });
    });
   
    // SHOW TITLE IMAGE CODE START
    $(document).ready(function(){
      $("#title-image").on("change", function(){
        let file = this.files[0];
        if(file.size < 200000)
        {
         
          let url = URL.createObjectURL(file);
          let image = new Image();
          image.src = url;
          image.onload = function(){
            let o_width = image.width;
            let o_height = image.height;

            if(o_width == 1920 && o_height == 978)
            {
              image.style.width = "100%";
              image.style.position = "absolute";
              image.style.top = "0";
              image.style.left = "0";
              $(".showcase-preview").append(image);
            }else
            {
              swal("Size not Matched!","Upload 1920*978 Size Image!", "error");
            }
          }
        }
        else
        {
          swal("Large Size!", "Please Upload Image Under 200kb!", "warning");
        }
      });
    });
     // SHOW TITLE IMAGE CODE END

    //  TITLE UNDER 40 LETTER CODE START
    $(document).ready(function () {
      $("#title-text").on("input", function(){
        let length = this.value.length;
        $(".showcase-title").html(this.value);
        $(".title-limit").html(" " + length);
      });
    });
    //  TITLE UNDER 40 LETTER CODE END


    //  SUB-TITLE UNDER 100 LETTER CODE START
    $(document).ready(function () {
      $("#subtitle-text").on("input", function(){
        let length = this.value.length;
        $(".showcase-subtitle").html(this.value);
        $(".subtitle-limit").html(" " + length);
      });
    });
    //  SUB-TITLE UNDER 100 LETTER CODE END

    // ADD SHOW CASE IN DATABASE - CODE START
    $(document).ready(function () {
      $(".header-showcase-form").on("submit", function (e) {
        e.preventDefault();

        let title = document.querySelector(".showcase-title");
        let subtitle = document.querySelector(".showcase-subtitle");
        let file = document.querySelector("#title-image").files[0]; //get file

        //getting title size and color
        let title_size = "";
        let title_color = "";
        if(title.style.fontSize == ""){
          title_size = "300%"; //default value
        }else{
          title_size = title.style.fontSize;
        }
        if(title.style.color == ""){
          title_color = "black"; //default value
        }else{
          title_color = title.style.color;
        }


        //getting sub-title size and color
        let subtitle_size = "";
        let subtitle_color = "";
        if(subtitle.style.fontSize == ""){
          subtitle_size = "300%"; //default value
        }else{
          subtitle_size = subtitle.style.fontSize;
        }
        if(subtitle.style.color == ""){
          subtitle_color = "black"; //default value
        }else{
          subtitle_color = subtitle.style.color;
        }

        // getting alignment
        let flex_box = document.querySelector(".showcase-preview");
        let h_align = "";
        let v_align = "";
        if(flex_box.style.justifyContent == ""){
          h_align = "flex-start";
        }else{
          h_align = flex_box.style.justifyContent;
        }
        if(flex_box.style.alignItems == ""){
          v_align = "flex-start";
        }else{
          v_align = flex_box.style.alignItems;
        }

        // Arrange all data
        let css_data = {
          title_size : title_size,
          title_color : title_color,
          subtitle_size : subtitle_size,
          subtitle_color : subtitle_color,
          h_align : h_align,
          v_align : v_align,
          title_text : title.innerHTML,
          subtitle_text : subtitle.innerHTML,
          buttons : $(".title-buttons").html().trim()
        };

        let formData = new FormData(this);
        formData.append("css_data", JSON.stringify(css_data));
        formData.append("file_data", file);


        // ajax request
        $.ajax({
          type: "POST",
          url: "php/create_showcase.php",
          data: formData,
          contentType: false,
          processData: false,
          cache: false,
          beforeSend: function () {},
          success: function (response) {
            if(response == "success"){
              swal("Successfully!", "Showcase added successfully!", "success");
            }else{
              swal(response.trim(), response.trim(), "error");
            }
          },
        });
      });
    });
    // ADD SHOW CASE IN DATABASE - CODE END

    // ADD BUTTON CODE START
    $(document).ready(function(){
      $(".add-btn").click(function(){
        let button = document.createElement("BUTTON");
        button.className = "btn mx-2";
        let a = document.createElement("A");
        a.href = $(".btn-url").val();
        a.innerHTML = $(".btn-name").val();
        a.style.color = $(".btn-textcolor").val();
        a.style.fontSize = $(".font-size").val();
        a.style.textDecoration = "none";
        button.style.backgroundColor = $(".btn-bgcolor").val();
        button.append(a);
        
        let title_button = document.querySelector(".title-buttons");
        let title_child = title_button.getElementsByTagName("BUTTON");
        let button_length = title_child.length;

        if(button_length == 0 || button_length == 1){
          $(".title-buttons").append(button);
        }else{
          swal("Sorry!!", "Only Two Buttons Are Allowed!", "warning");
        }
      });
    });
    // ADD BUTTON CODE END

    // ALIGNMENT CODE START
    $(document).ready(function() {
      $(".alignment").each(function(){
        $(this).click(function(){
          let align_position = $(this).attr("align-position");
          let align_value = $(this).attr("align-value");
          if(align_position == "h")
          {
            $(".showcase-preview").css({
              justifyContent : align_value
            });
          }else if(align_position == "v"){
            $(".showcase-preview").css({
              alignItems : align_value
            });
          }
        });
      });
    });
    // ALIGNMENT CODE END

    // PREVIEW CODE START
    $(document).ready(function() {
      $(".preview-btn").click(function(){
        let file = document.querySelector("#title-image").files[0];
        let formData = new FormData();
        formData.append("photo", file);

        // getting alignment
        let flex_box = document.querySelector(".showcase-preview");
        let h_align = "";
        let v_align = "";
        if(flex_box.style.justifyContent == ""){
          h_align = "flex-start";
        }else{
          h_align = flex_box.style.justifyContent;
        }
        if(flex_box.style.alignItems == ""){
          v_align = "flex-start";
        }else{
          v_align = flex_box.style.alignItems;
        }

        let array = [$(".title-box").html().trim(), h_align, v_align];
        formData.append("data", JSON.stringify(array));

        //ajax request
        $.ajax({
          type: "POST",
          url: "php/preview.php",
          data: formData,
          contentType: false,
          processData: false,
          cache: false,
          beforeSend: function () {},
          success: function (response) {
            let page = window.open("about:blank");
            page.document.open();
            page.document.write(response);
          },
        });
      });
    });
    // PREVIEW CODE END

    // ALL SHOWCASE EDIT CODE START
    $(document).ready(function(){
      $("#edit-title").on("change", function(){
        if($(this).val() != "choose title")
        {
         //ajax
         $.ajax({
          type : "POST",
          url : "php/edit_showcase.php",
          data : {
           id : $(this).val()
          },
          beforeSend : function(){},
          success : function(response){
            let all_data = JSON.parse(response.trim());
            let image = document.createElement("IMG");
            image.src = all_data[0];
            image.style.width = "100%";
            image.style.position = "absolute";
            image.style.left = "0";
            image.style.top = "0";
            $(".showcase-preview").append(image);
            $(".showcase-title").html(all_data[1]);
            $(".showcase-subtitle").html(all_data[4]);
          }
         }); 
        }
        else
        {
          swal("Invalid Choice!", "Please Select A Title!","error");
        }
      });
    });
    // ALL SHOWCASE EDIT CODE END

  </script>
  <!-- JS FILE LINK START -->
  <!-- <script src="js/script.js"></script> -->
  <!-- JS FILE LINK END -->
</html>