<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$id = $_POST['id'];

$get_data = "SELECT * FROM header_showcase";

$response = $db -> query($get_data);

if($response){
    
}

?>