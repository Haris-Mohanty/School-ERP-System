<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$email = $_POST['username'];
$password = $_POST['password'];

$get_user = "SELECT * FROM access";

$response = $db -> query($get_user);

if($response){
    $insert_data = "INSERT INTO access(email, password) VALUES ('$email', '$password')";

    if($db -> query($insert_data)){
        echo "success";

    }else{
        echo "Unable to Give Access!";
    }

}else{

    $create_table = "CREATE TABLE access(
        id INT(11) NOT NULL AUTO_INCREMENT,
        email VARCHAR(55),
        password VARCHAR(55),
        PRIMARY KEY(id)
    )";

    if($db -> query($create_table)){

        $insert_data = "INSERT INTO access(email, password) VALUES ('$email', '$password')";

        if($db -> query($insert_data)){
            echo "success";

        }else{
            echo "Unable to Give Access!";
        }

    }else{
        echo "Unable to Create Table!";
    }
}

?>