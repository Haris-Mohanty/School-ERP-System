<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$file = "";
$location = "";
$file_binary = "";

if($_FILES['title-image']['name'] != "") //compare
{
    $file = $_FILES['file_data'];
    $location = $file['tmp_name'];
    $file_binary = addslashes(file_get_contents($location));
}else
{
    $file = "";
    $location = "";
    $file_binary = "";
}

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

$option = $all_data['option'];

$check_table = "SELECT count(id) AS result FROM header_showcase"; //result is a column name(Using AS column declare.)

$response = $db -> query($check_table);

if($response){

    $data = $response -> fetch_assoc();
    $count_rows = $data['result'];

    if($count_rows < 3){
        
        if($option == "choose title")
        {
            $insert_data = "INSERT INTO header_showcase(title_image, title_text, title_color, title_size, subtitle_text, subtitle_color, subtitle_size, h_align, v_align, buttons) VALUES ('$file_binary', '$title_text', '$title_color', '$title_size', '$subtitle_text', '$subtitle_color', '$subtitle_size', '$h_align', '$v_align', '$buttons')";

            if($db -> query($insert_data)){
                echo "success";
            }else{
                echo "Unable to add Showcase!";
            }

        }else{

            if($file_binary == "")
            {

                $update_data = "UPDATE header_showcase SET title_text = '$title_text', title_color = '$title_color', title_size = '$title_size', subtitle_text = '$subtitle_text', subtitle_color = '$subtitle_color', subtitle_size = '$subtitle_size', h_align = '$h_align', v_align = '$v_align', buttons = '$buttons' WHERE id = '$option'";

                if($db -> query($update_data)){
                    echo "Showcase Updated";
                }else{
                    echo "Unable to Update Showcase!";
                }

            }else{

                $update_data = "UPDATE header_showcase SET title_image = '$file_binary', title_text = '$title_text', title_color = '$title_color', title_size = '$title_size', subtitle_text = '$subtitle_text', subtitle_color = '$subtitle_color', subtitle_size = '$subtitle_size', h_align = '$h_align', v_align = '$v_align', buttons = '$buttons' WHERE id = '$option'";

                if($db -> query($update_data)){
                    echo "Showcase Updated";
                }else{
                    echo "Unable to Update Showcase!";
                }

            }

        }

    }else if($count_rows >= 3){
        
        if($option == "choose title")
        {
            echo "Upto 3 Limits You Can Add!";
        }else{
            if($file_binary == "")
            {

                $update_data = "UPDATE header_showcase SET title_text = '$title_text', title_color = '$title_color', title_size = '$title_size', subtitle_text = '$subtitle_text', subtitle_color = '$subtitle_color', subtitle_size = '$subtitle_size', h_align = '$h_align', v_align = '$v_align', buttons = '$buttons' WHERE id = '$option'";

                if($db -> query($update_data)){
                    echo "Showcase Updated";
                }else{
                    echo "Unable to Update Showcase!";
                }

            }else{

                $update_data = "UPDATE header_showcase SET title_image = '$file_binary', title_text = '$title_text', title_color = '$title_color', title_size = '$title_size', subtitle_text = '$subtitle_text', subtitle_color = '$subtitle_color', subtitle_size = '$subtitle_size', h_align = '$h_align', v_align = '$v_align', buttons = '$buttons' WHERE id = '$option'";

                if($db -> query($update_data)){
                    echo "Showcase Updated";
                }else{
                    echo "Unable to Update Showcase!";
                }

            }
        }
    }

    
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

        $insert_data = "INSERT INTO header_showcase(title_image, title_text, title_color, title_size, subtitle_text, subtitle_color, subtitle_size, h_align, v_align, buttons) VALUES ('$file_binary', '$title_text', '$title_color', '$title_size', '$subtitle_text', '$subtitle_color', '$subtitle_size', '$h_align', '$v_align', '$buttons')";

        if($db -> query($insert_data)){
            echo "success";
        }else{
            echo "Unable to add Showcase!";
        }

    }else{
        echo "Unable to Create Table!";
    }
}


?>