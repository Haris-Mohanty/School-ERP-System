<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

//receive the name of form data (course_design.php) page.  
$category = $_POST['course-category'];
$code = $_POST['course-code'];
$course_name = $_POST['course-name'];
$detail = $_POST['course-detail'];
$duration = $_POST['course-duration'];
$time = $_POST['course-time'];
$fee = $_POST['course-fee'];
$fee_time = $_POST['course-fee-time'];
$file = $_FILES['course-logo'];
$added_by = $_POST['course-added-by'];
//ajax
$status = $_POST['status'];

$logo = "";
$name = "";
$location = "";

if($file['name'] == ""){
    $logo = "";
    $name = "";
    $location = "";
}else{
    $name = $file['name'];
    $location = $file['tmp_name'];
    $logo = "Course/".$name;
}

$getData = "SELECT * FROM course";

$response = $db -> query($getData);
if($response){
    $insert_data = "INSERT INTO course(category, code, name, detail, duration, course_time, fee, fee_time, logo, added_by, status) VALUES ('$category','$code','$course_name','$detail','$duration','$time','$fee','$fee_time','$logo','$added_by','$status')";

    if($db -> query($insert_data)){

        echo "Success";
        move_uploaded_file($location, "../Course/".$name);

    }else{
        echo "Unable to store data!";
    }
}else{
    $create_table = "CREATE TABLE course (
        id INT(11) NOT NULL AUTO_INCREMENT,
        category VARCHAR(65),
        code VARCHAR(65),
        name VARCHAR(55),
        detail VARCHAR(255),
        duration VARCHAR(55),
        course_time VARCHAR(55),
        fee VARCHAR(55),
        fee_time VARCHAR(55),
        logo VARCHAR(255),
        added_by VARCHAR(55),
        status VARCHAR(55),
        PRIMARY KEY(id)
    )";

    if($db -> query($create_table)){
         $insert_data = "INSERT INTO course(category, code, name, detail, duration, course_time, fee, fee_time, logo, added_by, status) VALUES ('$category','$code','$course_name','$detail','$duration','$time','$fee','$fee_time','$logo','$added_by','$status')";

        if($db -> query($insert_data)){
            echo "Success";
            move_uploaded_file($location, "../Course/".$name);
        }else{
            echo "Unable to store data!";
        }
    }else{
        echo "Unable to create table!";
    }
}

?>