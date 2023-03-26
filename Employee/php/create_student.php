<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$category = $_POST['stu-category'];
$course = $_POST['stu-course'];
$batch = $_POST['stu-batch'];
$enrollment = $_POST['enrollment'];
$student_name = $_POST['name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$father = $_POST['father'];
$mother = $_POST['mother'];
$email = $_POST['email'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$fee = $_POST['fee'];
$fee_time = $_POST['fee-time'];
$status = $_POST['status'];

$get_data = "SELECT * FROM students";

$response = $db -> query($get_data);

if($response){

}else{
    $create_table = "CREATE TABLE students(
        id INT(11) NOT NULL AUTO_INCREMENT,
        category VARCHAR(255),
        course VARCHAR(255),
        batch VARCHAR(255),
        enrollment VARCHAR(255),
        student_name VARCHAR(255),
        dob VARCHAR(255),
        gender VARCHAR(255),
        father VARCHAR(255),
        mother VARCHAR(255),
        email VARCHAR(255),
        password VARCHAR(255),
        mobile VARCHAR(255),
        country VARCHAR(255),
        state VARCHAR(255),
        city VARCHAR(255),
        pincode VARCHAR(255),
        fee VARCHAR(255),
        fee_time VARCHAR(255),
        status VARCHAR(255),
    )";
    if($db -> query($create_table)){
        $insert_data = 
    }else{
        echo "Unable to Create Table!";
    }
}

?>