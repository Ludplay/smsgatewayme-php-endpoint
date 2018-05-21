# smsgatewayme-php-endpoint
v4 smsgateway.me similar to old version's use

# Official Documentation
https://github.com/smsgatewayme/client-php

# Usage
require_once('smsGatewayV4.php');
$token = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';

$tel_destinatario = "+0031990000000";
$message = "Test smsGatewayV4";
$deviceID = 00000;
$options = [];

$smsGateway = new SmsGateway($token);
$result = $smsGateway->sendMessageToNumber($tel_destinatario, $message, $deviceID, $options);
print_r($result);

# Methods working
The main tasks are sendMessage and getMessage. The original API allow us to do more. Feel free to improve this repository.

# NEED CONTRIBUTORS!
This is just an initiative to help those who, like me, had the services using sms gateway/v3 stopped.
PHP-SDK from the original repository seems to be unstable by the time. So this is a good alternative.



