<?php

class PhoneNumber{
    public static function process_phone_number($phone_number){
        $new_number = '+593' . $phone_number;
        return (string)$new_number;
    }

    public static function verify_number($phone_number){
        is_numeric($phone_number);
    }
}