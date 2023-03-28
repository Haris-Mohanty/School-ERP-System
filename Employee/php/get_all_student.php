<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$table = $_POST['table'];
$category = $_POST['category'];
$batch = $_POST['batch'];

$get_students = "SELECT * FROM $table WHERE category = '$category' AND batch_name = '$batch'"; //name-column name

$response = $db -> query($get_students);

$all_data = [];

?>