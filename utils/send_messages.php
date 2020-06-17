<?php
include_once './lib/config.php';
include_once './twilio-php-master/src/Twilio/autoload.php';
use Twilio\Rest\Client;

class TwilioMessage{

    public static function sendMessage($codeOtp, $phoneNumber){
        $sid = SSID;
        $token = TOKEN;
        $client = new Client($sid, $token);

        $client->messages->create(
        // the number you'd like to send the message to
            $phoneNumber,
            [
                'from' => '+12057362785',
                'body' => "Este es tu codigo: " . $codeOtp
            ]
        );

        $client->availablePhoneNumbers('+593');
    }
}


class Message{
    public static function send_message($codeOTP, $phone_number){

        $message_fields =  '{"message":"Este es tu codigo OTP: ' . $codeOTP . ' ", "tpoa":"Sender","recipient":[{"msisdn":"' . $phone_number .'"}]}';

        $user = USERLABS;
        $password = PASSWORDLABS;

        $auth_basic = base64_encode("$user:$password");
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.labsmobile.com/json/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $message_fields,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Basic " . $auth_basic,
                "Cache-Control: no-cache",
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}
