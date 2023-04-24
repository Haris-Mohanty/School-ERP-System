<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$file = $_FILES['file_data'];
$location = $file['tmp_name'];
$file_binary = addslashes(file_get_contents($location));

$json_data = json_encode($_POST['css_data']); //receive by encoding
$tmp_data = json_decode($json_data, true);
$all_data = json_decode($tmp_data, true);

$title_text = addslashes($all_data['title_text']);
$title_size = addslashes($all_data['title_size']);
$title_color = addslashes($all_data['title_color']);

$subtitle_text = addslashes($all_data['subtitle_text']);
$subtitle_size = addslashes($all_data['subtitle_size']);
$subtitle_color = addslashes($all_data['subtitle_color']);

$h_align = $all_data['h_align'];
$v_align = $all_data['v_align'];

$buttons = addslashes($all_data['buttons']);

$check_table = "SELECT * FROM header_showcase";

$response = $db -> query($check_table);

if($response){

}else{
    $create_table = "CREATE TABLE header_showcase(
        id int(11) NOT NULL AUTO_INCREMENT,
        title_image MEDIUMBLOB,
        title_text VARCHAR(255),
        title_size VARCHAR(120),
        title_color VARCHAR(120),
        subtitle_text VARCHAR(255),
        subtitle_size VARCHAR(120),
        subtitle_color VARCHAR(120),
        h_align VARCHAR(120),
        v_align VARCHAR(120),
        buttons MEDIUMTEXT,
        PRIMARY KEY(id)
    )";
    if($db -> query($create_table)){

        $insert_data = "INSERT INTO header_showcase(title_image, title_text, title_size, subtitle_image, subtitle_text, subtitle_size,) VALUES ()";

    }else{
        echo "Unable to Create Table!";
    }
}


?>