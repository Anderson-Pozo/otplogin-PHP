<?php

class Password{

    public static function generatePasswordHash($password){
        return password_hash($password,PASSWORD_DEFAULT, ['cost' => 10]);
    }

    public static function verifyPasswordHash($password, $hash){
        return password_verify($password,$hash);
    }

}
