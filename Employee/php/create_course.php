<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

//receive the name of form data (course_design.php) page.  
$category = $_POST['course-category'];
$code = $_POST['course-code'];
$name = $_POST['course-name'];
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
    echo "Found";
}else{
    $create_table = "CREATE TABLE course (
        id INT(11) NOT NULL AUTO_INCREMENT,
        category VARCHAR(65),
        code VARCHAR(65),
        name VARCHAR(55),
        details VARCHAR(255),
        duration VARCHAR(55),
        course_time VARCHAR(55),
        fee VARCHAR(55),
        fee_time VARCHAR(55),
        logo VARCHAR(255),
        added_by VARCHAR(55),
        status VARCHAR(55),
        PRIMARY KEY(id)
    )";
}

?>