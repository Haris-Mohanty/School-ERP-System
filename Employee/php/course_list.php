<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$category = $_POST['category'];
$get_course = "SELECT * FROM course WHERE category = '$category'";

$response = $db -> query($get_course);

if($response){
    if($response -> num_rows != 0){

    }else{
        
    }
}else{
    echo "There is No Data Found!";
}

?>