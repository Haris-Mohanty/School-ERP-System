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
   
    $insert_data = "INSERT INTO register(name, email, mobile, description) VALUES ('$name', '$email', '$mobile', '$desc')";

        if($db -> query($insert_data)){
            require("sendsms.php");
        }else{
            echo "Unable to Register!";
        }

}else
{
    $create_table = "CREATE TABLE register(
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(55),
        email VARCHAR(55),
        mobile VARCHAR(25),
        description VARCHAR(55),
        status VARCHAR(55) DEFAULT 'pending',
        reg_date datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY(id)
    )";
    if($db -> query($create_table)){

        $insert_data = "INSERT INTO register(name, email, mobile, description) VALUES ('$name', '$email', '$mobile', '$desc')";

        if($db -> query($insert_data)){
            require("sendsms.php");
        }else{
            echo "Unable to Register!";
        }

    }else{
        echo "Unable to Create Table!";
    }
}

?>