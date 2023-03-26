<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$table = $_POST['table'];
$category = $_POST['category'];
$course = $_POST['course'];

$get_fee = "SELECT fee, fee_time FROM $table WHERE category = '$category' AND name = '$course'"; //name-column name

$response = $db -> query($get_fee);

$all_data = [];

if($response){
    if($response -> num_rows != 0){
        
        $data =  $response -> fetch_assoc();
        echo json_encode($data);

    }else{
        echo "There is No Course Found!";
    }
}else{
    echo "There is No Course Found!";
}


?>