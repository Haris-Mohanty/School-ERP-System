<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$category = $_POST['batch-category'];
$course = $_POST['batch-course'];
$batch_code = $_POST['batch-code'];
$batch_name = $_POST['batch-name'];
$detail = $_POST['batch-detail'];
$batch_from = $_POST['batch-from'];
$batch_to = $_POST['batch-to'];
$batch_from_date = $_POST['batch-from-date'];
$batch_to_date = $_POST['batch-to-date'];
$files = $_FILES['batch-logo'];
$batch_added_by = $_POST['batch-added-by'];
$status = $_POST['status'];



?>