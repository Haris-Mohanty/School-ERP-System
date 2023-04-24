<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

// $file = $_FILES['file_data'];
$json_data = json_encode($_POST['css_data']); //receive by encoding
$tmp_data = json_decode($json_data, true);
$all_data = json_decode($tmp_data, true);

$title_text = $all_data['title_text'];
$title_size = $all_data['title_size'];
$title_color = $all_data['title_color'];

$subtitle_text = $all_data['subtitle_text'];
$subtitle_size = $all_data['subtitle_size'];
$subtitle_color = $all_data['subtitle_color'];

$h_align = $all_data['h_align'];
$v_align = $all_data['v_align'];

$buttons = $all_data['buttons'];


?>