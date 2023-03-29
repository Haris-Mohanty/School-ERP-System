<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

//receive the name of form data (course_design.php) page.  
$category = $_POST['batch-category'];
$course = $_POST['batch-course'];
$batch_code = $_POST['batch-code'];
$batch_name = $_POST['batch-name'];
$detail = $_POST['batch-detail'];
$batch_from = $_POST['batch-from'];
$batch_to = $_POST['batch-to'];
$batch_from_date = $_POST['batch-from-date'];
$batch_to_date = $_POST['batch-to-date'];
$file = $_FILES['batch-logo'];
$batch_added_by = $_POST['batch-added-by'];
$status = $_POST['status'];
$id = $_POST['id'];

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
    $logo = "Batch/".$name;
}

if($file['name'] == ""){
    $update_batch = "UPDATE batch SET category = '$category', course = '$course', batch_code = '$batch_code', batch_name = '$batch_name', detail = '$detail', batch_from = '$batch_from', batch_to = '$batch_to', batch_from_date = '$batch_from_date', batch_to_date = '$batch_to_date', batch_added_by = '$batch_added_by', status = '$status' WHERE id = '$id'";

    if($db -> query($update_batch)){
        echo "success";
    }else{
        echo "Unable to Update Course!";
    }
}else{
    $update_batch = "UPDATE batch SET category = '$category', course = '$course', batch_code = '$batch_code', batch_name = '$batch_name', detail = '$detail', batch_from = '$batch_from', batch_to = '$batch_to', batch_from_date = '$batch_from_date', batch_to_date = '$batch_to_date', logo = '$logo' ,batch_added_by = '$batch_added_by', status = '$status' WHERE id = '$id'";
     
     if($db -> query($update_batch)){
         echo "success";
         move_uploaded_file($location, "../Batch/".$name);
     }else{
         echo "Unable to Update Course!";
     }
}
?>