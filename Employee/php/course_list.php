<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$category = $_POST['category'];
$get_course = "SELECT * FROM course WHERE category = '$category'";



?>