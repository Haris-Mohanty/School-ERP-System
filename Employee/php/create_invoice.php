<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$enrollment = $_POST['invoice-enrollment'];
$name = $_POST['invoice-name'];
$category = $_POST['invoice-category'];
$course = $_POST['invoice-course'];
$batch = $_POST['invoice-batch'];
$paid_fee = $_POST['paid-fee'];
$pending = $_POST['pending'];

?>