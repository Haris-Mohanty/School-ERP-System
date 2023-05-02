<?php
require('textlocal.class.php');

$textlocal = new Textlocal(false, false, 'NmE1MjZjNGU3NDcwNDU2Zjc5NzU3NTRjMzk0OTY2NjE=');

$numbers = array("91".$mobile);
$sender = '600010';
$message = 'Hi there, thank you for sending your first test message from Textlocal. See how you can send effective SMS campaigns here: https://tx.gl/r/2nGVj/
    ';

try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    print_r($result);
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
?>