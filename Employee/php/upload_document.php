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
$proof_url = "Document/stu_".$enrollment.".png";


?>