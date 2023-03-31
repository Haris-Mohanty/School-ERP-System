<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$table = $_POST['table'];
$column = $_POST['column'];
$data = $_POST['user_data'];

$get_data = "SELECT $column FROM $table WHERE $column = '$data'";

$response = $db -> query($get_data);

if($response){
    if($response -> num_rows == 0){
        echo "Not Match!";
    }else{
        echo "already Exists!";
    }
}else{
    echo "Not Match";
}

?>