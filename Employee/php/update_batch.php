<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");



if($file['name'] == ""){
    $update_batch = "UPDATE batch SET category = '$category', course = '$course', batch_code = '$batch_code', batch_name = '$batch_name', detail = '$detail', batch_from = '$batch_from', batch_to = '$batch_to', batch_from_date = '$batch_from_date', batch_to_date = '$batch_to_date', batch_added_by = '$batch_added_by', status = '$status' WHERE id = '$id'";

    if($db -> query($update_batch)){
        echo "success";
    }else{
        echo "Unable to Update Course!";
    }
}else{
    $update_batch = "UPDATE batch SET category = '$category', course = '$course', batch_code = '$batch_code', batch_name = '$batch_name', detail = '$detail', batch_from = '$batch_from', batch_to = '$batch_to', batch_from_date = '$batch_from_date', batch_to_date = '$batch_to_date', logo = '$logo' ,batch_added_by = '$batch_added_by', status = '$status' WHERE id = '$id'";
     
     if($db -> query($update_batch)){
         echo "success";
         move_uploaded_file($location, "../Batch/".$name);
     }else{
         echo "Unable to Update Course!";
     }
}
?>