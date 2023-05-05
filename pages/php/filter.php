<?php

//Database linked
require("../../Common_files/php/database.php");

$cat_name = $_POST['cat_name'];
$course_name = $_POST['course_name'];

$get_batch = "SELECT * FROM batch WHERE category = '$cat_name' AND course = '$course_name'";

$response = $db -> query($get_batch);

if($response){
    echo "found";
}else{
    echo "";
}

?>