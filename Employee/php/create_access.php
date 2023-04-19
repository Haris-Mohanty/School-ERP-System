<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$username = $_POST['username'];
$password = $_POST['password'];

$get_user = "SELECT * FROM access";

$response = $db -> query($get_user);

if($response){
    echo "Found";

}else{

    $create_table = "";
}

?>