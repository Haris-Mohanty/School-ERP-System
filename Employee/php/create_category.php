<?php

require_once("../../Common_files/php/database.php");

$category = json_decode($_POST['category']);
$details = json_decode($_POST['details']);
$message = "";

$length = count($category);//getting length

//get dynamic table
$get_category = "SELECT * FROM category";
$response = $db -> query($get_category);
if($response){
    for($i=0; $i<$length; $i++){
            $insert_data = "INSERT INTO category(category_name, details) 
                                  VALUES ('$category[$i]' , '$details[$i]')";

            if($db -> query($insert_data)){
                $message = "Your Data has been Inserted Successfully!";
            }else{
                $message = "Unable to Store Data";
            }
    }
    echo $message;
}else{
    $create_table = "CREATE TABLE category(
        id INT(11) NOT NULL AUTO_INCREMENT,
        category_name VARCHAR(55),
        details VARCHAR(255),
        PRIMARY KEY(id)
    )";
    if($db -> query($create_table)){
        for($i=0; $i<$length; $i++){
            $insert_data = "INSERT INTO category(category_name, details) 
                                  VALUES ('$category[$i]' , '$details[$i]')";

            if($db -> query($insert_data)){
                $message = "Data Inserted Successfully!";
            }else{
                $message = "Unable to Store Data";
            }
        } 
        echo $message;
    }else{
        $message = "Unable to create Table!";
    }
}

?>