<?php
require('textlocal.class.php');

$textlocal = new Textlocal(false, false, 'NmE1MjZjNGU3NDcwNDU2Zjc5NzU3NTRjMzk0OTY2NjE=');

$numbers = array(918123456789);
$sender = '600010';
$message = 'This is a message';

try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    print_r($result);
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
?>