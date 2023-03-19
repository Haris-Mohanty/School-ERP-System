<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$category = $_POST['category'];
$get_course = "SELECT * FROM course WHERE category = '$category'";
$all_data = [];

$response = $db -> query($get_course);

if($response){
    if($response -> num_rows != 0){

        while($data = $response -> fetch_assoc()){
            array_push($all_data, $data);
        }
       echo json_encode($all_data);

    }else{
        echo "There is No Course Found!";
    }
}else{
    echo "There is No Course Found!";
}

?>