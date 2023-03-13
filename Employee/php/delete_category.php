<?php

require_once("../../Common_files/php/database.php");

$id = $_POST['id'];
$category = $_POST['category'];
$details = $_POST['details'];

$deleteCategory = "DELETE FROM category WHERE id = '$id'";

if($db -> query($deleteCategory)){
    echo "success";
}else{
    echo "Unable to Delete Data!";
}

?>