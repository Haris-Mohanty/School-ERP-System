<?php

require_once("../../Common_files/php/database.php");

$id = $_POST['id'];
$table = $_POST['table'];

$deleteCategory = "DELETE FROM $table WHERE id = '$id'";

if($db -> query($deleteCategory)){
    echo "success";
}else{
    echo "Unable to Delete Data!";
}

?>