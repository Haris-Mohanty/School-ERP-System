<?php

//Database linked
require("Common_files/php/database.php");
$category = $_GET['cat_name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP CSS LINK START -->
    <link rel="stylesheet" href="Common_files/css/bootstrap.min.css" />
    <!-- BOOTSTRAP CSS LINK END -->

    <!-- BOOTSTRAP JS LINK START -->
    <script src="Common_files/js/bootstrap.bundle.min.js"></script>
    <!-- BOOTSTRAP JS LINK END -->

    <!-- ANIMATE CSS LINK START -->
    <link rel="stylesheet" href="Common_files/css/animate.min.css" />
    <!-- ANIMATE CSS LINK END -->

    <!-- SWEET ALERT JS LINK START -->
    <script src="Common_files/js/sweetalert.min.js"></script>
    <!-- SWEET ALERT JS LINK END -->

    <!--FONT AWESOME LINK START -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!--FONT AWESOME LINK END -->

    <!-- JQUERY LINK START -->
    <script src="Common_files/js/jquery.min.js"></script>
    <!-- JQUERY LINK END -->

    <!--   GOOGLE FONT START -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide"/>
    <!--   GOOGLE FONT END -->

    <title>Course</title>
    <link rel="stylesheet" href="pages/index.css">
</head>
<body>
    <!-- nav -->
    <?php require("assets/nav.php"); ?>

    <div class="container" style="margin-top: 100px;">
     <a href="#" class="text-uppercase"><?php echo $category ?></a><br><br>
        <div class="row">
            <div class="col-md-3">
                <div class="border bg-white p-4">
                    <h5>Filter</h5>
                    <div class="btn-group-vertical">
                        <?php
                            $get_course = "SELECT * FROM course WHERE category = '$category'";
                            $course_response = $db -> query($get_course);

                            if($course_response)
                            {
                                while($data = $course_response -> fetch_assoc())
                                {
                                    echo "<button cat-name='".$data['category']."' class='btn filter-btn px-3 text-capitalize border'> <i class='fa fa-angle-double-right'></i> ".$data['name']."</button>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="bg-white d-flex flex-wrap justify-content-between batch-result border p-4">
                    <div class="w-50 shadow-sm p-3 border mb-4">
                        <img src="images/buss.jpg" class="w-100" alt=""><br><br>
                        <span class="mt-3 fw-bold text-uppercase">JAVASCRIPT</span><br><br>
                        <span class="fw-bold text-uppercase">Batch Time : 09:00 to 10:50</span><br><br>
                        <span class="fw-bold text-uppercase">Batch Time : 09:00 to 10:50</span><br><br>
                        <a href="http://localhost/School-ERP-System/register.php" class="btn btn-primary">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- footer -->
    <?php require("assets/footer.php"); ?>
     
    <script>
        $(document).ready(function(){
            $(".filter-btn").each(function(){
                $(this).click(function(){
                    let cat_name = $(this).attr('cat-name').trim();
                    let course_name = $(this).text().trim();

                    //ajax
                    $.ajax({
                        type : "POST",
                        url : "pages/php/filter.php",
                        data : {
                            cat_name : cat_name,
                            course_name : course_name
                        },
                        cache : false,
                        beforeSend : function(){},
                        success : function(response){
                            alert(response)
                        },
                    });
                });
            });
        });
    </script>

</body>
</html>