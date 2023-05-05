<?php

//Database linked
require("../../Common_files/php/database.php");

$cat_name = $_POST['cat_name'];
$course_name = $_POST['course_name'];
$batch_list = [];

$get_batch = "SELECT * FROM batch WHERE category = '$cat_name' AND course = '$course_name'";

$response = $db -> query($get_batch);

if($response){
    while($data = $response -> fetch_assoc())
    {
        array_push($batch_list, $data);
    }
    
    echo json_encode($batch_list);

}else{
    echo "There is no Batch!";
}

?>