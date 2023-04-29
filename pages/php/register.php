<?php

//Database linked
require("../../Common_files/php/database.php");

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$desc = $_POST['desc'];

$check_table = "SELECT * FROM register";

$response = $db -> query($check_table);

if($response){
    
}

?>