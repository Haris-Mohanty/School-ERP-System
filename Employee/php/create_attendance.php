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
        
    )";

}

?>