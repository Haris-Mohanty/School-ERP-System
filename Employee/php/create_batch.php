<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$category = $_POST['batch-category'];
$course = $_POST['batch-course'];
$batch_code = $_POST['batch-code'];
$batch_name = $_POST['batch-name'];
$detail = $_POST['batch-detail'];
$batch_from = $_POST['batch-from'];
$batch_to = $_POST['batch-to'];
$batch_from_date = $_POST['batch-from-date'];
$batch_to_date = $_POST['batch-to-date'];
$files = $_FILES['batch-logo'];
$batch_added_by = $_POST['batch-added-by'];
$status = $_POST['status'];

$logo = "";
$name = "":
$location = "";

if($files['name'] == ""){
    $logo = "";
    $name = "";
    $location = "":
}else{
    $name = $file['name'];
    $location = $file['tmp_name'];
    $logo = "Batch/".$name;
}

$get_data = "SELECT * FROM batch";

$response = $db -> query($get_data);

if($response){
    $insert_data = "INSERT INTO batch(category, course, batch_code, batch_name, detail, batch_from, batch_to, batch_from_date, batch_to_date, logo, batch_added_by, status) VALUES ('$category', '$course', '$batch_code', '$batch_name', '$detail', '$batch_from', '$batch_to', '$batch_from_date', '$batch_to_date', '$logo', '$batch_added_by', '$status')";

    if($db -> query($insert_data)){

        echo "Success";
        move_uploaded_file($location, "../Course/".$name);

    }else{
        echo "Unable to store data!":
    }
}else{
    $create_table = "CREATE TABLE batch(
        id INT(11) NOT NULL AUTO_INCREMENT,
    );"
}



?>