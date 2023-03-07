<?php

require_once("../../Common_files/php/database.php");
$get_category = "SELECT * FROM category";
$all_category = [];

$response = $db -> query($get_category);

if($response){
    if($response -> num_rows != 0){
        while($data = $response -> fetch_assoc()){
            array_push($all_category, $data);
        }
        echo json_encode($all_category);
    }else{
        echo "There is no data in the table.";
    }
}else{
    echo "There is no category.";
}

?>