<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");
$enrollment = $_POST['enrollment'];
$photo = $_FILES['photo'];
$signature = $_FILES['signature'];
$id_proof = $_FILES['id-proof'];

$photo_location = $photo['tmp_name'];
$signature_location = $signature['tmp_name'];
$proof_location = $id_proof['tmp_name'];

//Prepare URL for update in DATABASE
$photo_url = "Photo/stu_".$enrollment.".png";
$signature_url = "Signature/stu_".$enrollment.".png";
$proof_url = "Document/stu_".$enrollment.".pdf";

//update in student table
$update_student = "UPDATE students SET photo = '$photo_url', signature = '$signature_url', id_proof = '$proof_url' WHERE enrollment = '$enrollment'";

if($db -> query($update_student)){
    echo "success";
    move_uploaded_file($photo_location, "../".$photo_url);
    move_uploaded_file($signature_location, "../".$signature_url);
    move_uploaded_file($proof_location, "../".$proof_url);

}else{
    echo "Unable to Upload Data!";
}


?>