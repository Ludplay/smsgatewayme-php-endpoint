
<?php
require_once('smsGatewayV4.php');
$token = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";

$phone = "+5531999999999";
$message = "Test smsGatewayV4";
$deviceID = 00000;
$options = [];

$smsGateway = new SmsGateway($token);
$result = $smsGateway->sendMessageToNumber($tel_destinatario, $message, $deviceID, $options);

print_r($result);
?>
