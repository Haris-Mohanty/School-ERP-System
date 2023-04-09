<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$enrollment = json_decode($_POST['enrollment']);
$name = json_decode($_POST['name']);
$batch = json_decode($_POST['batch']);
$attendance = json_decode($_POST['attendance']);

$length = count($name); //get length

$message = "";

$get_att = "SELECT * FROM attendance";

$response = $db -> query($get_att);
if($response)
{
    for($i=0;$i<$length;$i++)
    {
        $insert_data = "INSERT INTO attendance(name,enrollment,batch,attendance)
        VALUES('$name[$i]','$enrollment[$i]','$batch[$i]','$attendance[$i]')";
        if($db -> query($insert_data))
        {
            $message = "success";
        }
        else
        {
            $message = "Unable to insert data !";
        }
    }
    echo $message;
}
else
{
    $create_table = "CREATE TABLE attendance(

        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(55),
        enrollment VARCHAR(55),
        batch VARCHAR(55),
        attendance VARCHAR(55),
        PRIMARY KEY (id)
    )";
    if($db -> query($create_table))
    {
        for($i=0;$i<$length;$i++)
        {
            $insert_data = "INSERT INTO attendance(name,enrollment,batch,attendance)
            VALUES('$name[$i]','$enrollment[$i]','$batch[$i]','$attendance[$i]')";
            if($db -> query($insert_data))
            {
                $message = "success";
            }
            else
            {
                $message = "Unable to insert data !";
            }
        }
        echo $message;
    }
    else
    {
        echo "Unable To Create Table";
    }
}

?>