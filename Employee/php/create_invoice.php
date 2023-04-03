<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$enrollment = $_POST['invoice-enrollment'];
$name = $_POST['invoice-name'];
$category = $_POST['invoice-category'];
$course = $_POST['invoice-course'];
$batch = $_POST['invoice-batch'];
$paid_fee = $_POST['paid_fee'];
$pending = $_POST['pending'];

$fee_time = $_POST['invoice-fee-time'];
$invoice_pending = $_POST['invoice-pending'];
$invoice_recent = $_POST['invoice-recent'];

$get_data = "SELECT * FROM invoice";

$response = $db -> query($get_data);
if($response){
    $insert_data = "INSERT INTO invoice(enrollment, name, category, course, batch, paid_fee, pending, fee_time, invoice_pending, invoice_recent) VALUES('$enrollment', '$name', '$category', '$course', '$batch', '$paid_fee', '$pending', '$fee_time', '$invoice_pending', '$invoice_recent')";
    if($db -> query($insert_data)){

        $update_student = "UPDATE students SET paid_fee = '$paid_fee' WHERE enrollment";    
        echo "success";
    }else{
        echo "Unable to Create Invoice!";
    }
}else{
    $create_table = "CREATE TABLE invoice(
        id INT(11) NOT NULL AUTO_INCREMENT,
        enrollment VARCHAR(55),
        name VARCHAR(55),
        category VARCHAR(55),
        course VARCHAR(55),
        batch VARCHAR(55),
        paid_fee VARCHAR(55),
        pending VARCHAR(55),
        fee_time VARCHAR(55),
        invoice_pending VARCHAR(55),
        invoice_recent VARCHAR(55),
        PRIMARY KEY(id)
    )";
    if($db -> query($create_table)){
        $insert_data = "INSERT INTO invoice(enrollment, name, category, course, batch, paid_fee, pending, fee_time, invoice_pending, invoice_recent) VALUES('$enrollment', '$name', '$category', '$course', '$batch', '$paid_fee', '$pending', '$fee_time', '$invoice_pending', '$invoice_recent')";
        if($db -> query($insert_data)){

           $update_student = "UPDATE students SET paid_fee = '$paid_fee' WHERE enrollment";         
            echo "success";
        }else{
            echo "Unable to Create Invoice!";
        }
    }else{
        echo "Unable to Create Table!";
    }
}



?>