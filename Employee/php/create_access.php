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

    $create_table = "CREATE TABLE access(
        id INT(11) NOT NULL AUTO_INCREMENT,
        username VARCHAR(55),
        password VARCHAR(55),
        PRIMARY KEY(id)
    )";

    if($db -> query($create_table)){

    }else{
        echo "Unable to Create Table!";
    }
}

?>