<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

// $file = $_FILES['file_data'];
$json_data = json_encode($_POST['css_data']); //receive by encoding
$tmp_data = json_decode($json_data, true);
$all_data = json_decode($tmp_data, true);
print_r($all_data);



?>