<?php

require("../Common_files/php/database.php");

$email = $_POST['email'];
$password = $_POST['password'];
$user = $_POST['user'];

if($user == "admin"){
    $get_email = "SELECT email FROM access WHERE email = '$email'";

    $email_res = $db -> query($get_email);
    
    if($email_res -> num_rows != 0){
        $get_pass = "SELECT password FROM access WHERE password = '$password'";
        $pass_res = $db -> query($get_pass);

        if($pass_res -> num_rows != 0){
            echo "login success";
            
        }else{
            echo "Wrong Password!";
        }
    }else{
        echo "Wrong Username!";
    }

}else{
    $get_email = "SELECT email FROM students WHERE email = '$email'";

    $email_res = $db -> query($get_email);
    
    if($email_res -> num_rows != 0){
        $get_pass = "SELECT password FROM students WHERE password = '$password'";
        $pass_res = $db -> query($get_pass);

        if($pass_res -> num_rows != 0){
            echo "login success";
            
        }else{
            echo "Wrong Password!";
        }
    }else{
        echo "Wrong Username!";
    }
}

?>