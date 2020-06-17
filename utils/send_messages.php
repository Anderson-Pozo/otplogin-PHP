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