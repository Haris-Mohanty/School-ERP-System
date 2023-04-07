<?php

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$brand_name = $_POST['brand-name'];
$brand_domain = $_POST['brand-domain'];
$brand_email = $_POST['brand-email'];
$brand_twitter = $_POST['brand-twitter'];
$brand_facebook = $_POST['brand-facebook'];
$brand_instagram = $_POST['brand-instagram'];
$brand_whatsapp = $_POST['brand-whatsapp'];
$brand_address = $_POST['brand-address'];
$brand_mobile = $_POST['brand-mobile'];
$brand_about = $_POST['brand-about'];
$brand_privacy = $_POST['brand-privacy'];
$brand_cookie = $_POST['brand-cookie'];
$brand_terms = $_POST['brand-terms'];

$brand_logo = $_FILES['brand-logo'];
$logo = "";
$location = "";
if($brand_logo['name'] == ""){
    $logo = "";
    $location = "";
}else{
    $location = $brand_logo['tmp_name'];
    $logo = addslashes(file_get_contents($location));
}


$get_data = "SELECT * FROM branding";

$response = $db -> query($get_data);

if($response){

    if($logo == ""){
        $update_brand = "UPDATE branding SET brand_name, brand_domain, brand_email, brand_twitter, brand_facebook, brand_instagram, brand_whatsapp,brand_address,brand_mobile, brand_about, brand_privacy, brand_cookie, brand_terms";
    }

}else{
    $create_table = "CREATE TABLE branding(
        id INT(11) NOT NULL AUTO_INCREMENT,
        brand_name VARCHAR(255),
        brand_logo BLOB,
        brand_domain VARCHAR(255),
        brand_email VARCHAR(255),
        brand_twitter VARCHAR(255),
        brand_facebook VARCHAR(255),
        brand_instagram VARCHAR(255),
        brand_whatsapp VARCHAR(255),
        brand_address VARCHAR(255),
        brand_mobile VARCHAR(255),
        brand_about VARCHAR(255),
        brand_privacy VARCHAR(255),
        brand_cookie VARCHAR(255),
        brand_terms VARCHAR(255),
        PRIMARY KEY(id)
    )"; 
    if($db -> query($create_table)){

        $insert_data = "INSERT INTO branding(brand_name, brand_logo, brand_domain, brand_email, brand_twitter, brand_facebook, brand_instagram, brand_whatsapp,brand_address,brand_mobile, brand_about, brand_privacy, brand_cookie, brand_terms) VALUES ('$brand_name', '$logo', '$brand_domain', '$brand_email', '$brand_twitter', '$brand_facebook', '$brand_instagram', '$brand_whatsapp', '$brand_address', '$brand_mobile', '$brand_about', '$brand_privacy', '$brand_cookie', '$brand_terms')";

        if($db -> query($insert_data)){
            echo "success";
        }else{
            echo "Unable to Create Brand!";
        }

    }else{
        echo "Unable to Create Table!";
    }
  }
?>