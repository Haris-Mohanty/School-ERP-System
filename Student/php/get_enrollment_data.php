<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$table = $_POST['table'];
$user_data = $_POST['user_data'];

$get_data = "SELECT * FROM $table WHERE enrollment = '$user_data'";

$response = $db -> query($get_data);

if($response){
    if($response -> num_rows != 0){
        
        $data = $response -> fetch_assoc();

        echo json_encode($data);

    }else{
        echo "Not Match!";
    }
}else{
    echo "Not Match";skj
}

?>