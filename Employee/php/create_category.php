<?php

require_once("../../Common_files/php/database.php");

$category = json_decode($_POST['category']);
$details = json_decode($_POST['details']);

//get dynamic table
$get_category = "SELECT * FROM category";


?>