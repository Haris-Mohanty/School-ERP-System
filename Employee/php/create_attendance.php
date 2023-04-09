<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$enrollment = json_decode($_POST['enrollment']);
$name = json_decode($_POST['name']);
$batch = json_decode($_POST['batch']);
$attendance = json_decode($_POST['attendance']);

$get_att = "SELECT * FROM attendance";

$response = $db -> query($get_att);
if($response){

    echo "Found";

}else{

    $create_table = "CREATE TABLE attendance(
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(55),
        enrollment VARCHAR(55),
        batch VARCHAR(55),
        attendance VARCHAR(55),
        PRIMARY KEY(id)
    )";
    if($db -> query($create_table)){
        $insert_data = "INSERT INTO attendance() VALUES ()";
    }else{
        echo "Unable to Create Table!";
    }

}

?>