<?php

require_once("../../Common_files/php/database.php");

$category = json_decode($_POST['category']);
$details = json_decode($_POST['details']);

//get dynamic table
$get_category = "SELECT * FROM category";
$response = $db -> query($get_category);
if($response){
    echo "Table Found";
}else{
    $create_table = "CREATE TABLE category(
        id INT(11) NOT NULL AUTO_INCREMENT,
        category_name VARCHAR(55),
        details VARCHAR(255),
        PRIMARY KEY(id)
    )";
    if($db -> query($create_table)){
        echo "table created.";
    }else{
        echo "faild";
    }
}

?>