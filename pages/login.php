<?php

require("../Common_files/php/database.php");

$email = $_POST['email'];
$password = $_POST['password'];
$user = $_POST['user'];

if($user == "admin"){
    echo "Admin";
}else{
    echo "Student";
}

?>