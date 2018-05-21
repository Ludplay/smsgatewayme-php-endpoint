<?php

class SmsGateway {

    static $baseUrl = "https://smsgateway.me";

    function __construct($apiKeyAuthorization, $email=null,$password=null) {
        $this->email = $email;
        $this->password = $password;
        $this->authorization = $apiKeyAuthorization;
    }

    function createContact ($name,$number) {
        return $this->makeRequest('/api/v4/contact','POST',['name' => $name, 'phoneNumbers' => $number]);
    }

    function getContact ($id) {
        return $this->makeRequest('/api/v4/contact/'.$id,'GET');
    }

    function getDevice ($id)
    {
        return $this->makeRequest('/api/v4/device/'.$id,'GET');
    }

    function getMessage($id)
    {
        return $this->makeRequest('/api/v4/message/'.$id,'GET');
    }

    function sendMessageToNumber($to, $message, $device, $options=[]) {
        $query = array_merge(['phone_number'=>$to, 'message'=>$message, 'device_id' => $device], $options);
        return $this->makeRequest('/api/v4/message/send','POST',$query);
    }

    function sendManyMessages ($data) {
        $query['data'] = $data;
        return $this->makeRequest('/api/v4/message/send','POST', $query);
    }

    private function makeRequest ($url, $method, $fields=[]) {

        $url = smsGateway::$baseUrl.$url;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => "[  " . json_encode($fields) . "]",
            CURLOPT_HTTPHEADER => array(
                "authorization: $this->authorization",
                "cache-control: no-cache"
            ),
        ));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec ($curl);

        $return['response'] = json_decode($result,true);

        if($return['response'] == false)
            $return['response'] = $result;

        $return['status'] = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close ($curl);

        return $return;
    }
}

?>
