
<?php
require_once('smsGatewayV4.php');
$token = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";

$phone_number = "+5531999999999";
$message = "Test smsGatewayV4";
$deviceID = 00000;
$options = [];

$smsGateway = new SmsGateway($token);
$result = $smsGateway->sendMessageToNumber($phone_number, $message, $deviceID, $options);

print_r($result);
?>
