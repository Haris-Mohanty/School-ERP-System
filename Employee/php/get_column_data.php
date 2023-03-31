<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$table = $_POST['table'];
$column = $_POST['column'];
$data = $_POST['user_data'];

$get_data = "SELECT $column FROM $table WHERE $column = '$data'";



?>