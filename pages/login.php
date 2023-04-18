<?php

require("../Common_files/php/database.php");

$email = $_POST['email'];
$password = $_POST['password'];
$user = $_POST['user'];

if($user == "admin"){
    echo "Admin";
}else{
    $get_email = "SELECT email FROM students WHERE email = '$email'";

    $email_res = $db -> query($get_email);
    
    if($email_res -> num_rows != 0){
        $get_pass = 
    }else{
        echo "Wrong Username";
    }
}

?>