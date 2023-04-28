<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$id = $_POST['id'];

$delete_row = "DELETE FROM header_showcase WHERE id = '$id'";

$response = $db -> query($delete_row);

    if($response){
        echo "success";           
    }
    else{
        echo "Unable to Delete Showcase!";
    }

?>