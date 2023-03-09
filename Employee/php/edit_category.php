<?php

require_once("../../Common_files/php/database.php");
$id = $_POST['id'];
$category = $_POST['category'];
$details = $_POST['details'];

$update_category = "UPDATE category SET category_name = '$category', details = '$details' WHERE id = '$id'";

if($db -> query($update_category)){
    echo "success";
}else{
    echo "Unable to Update Data.";
}

?>