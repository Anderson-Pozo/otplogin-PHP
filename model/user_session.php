<?php

class UserSession{

    public function __construct(){
        session_start();
    }

    public function setCurrentUser($user){
        $_SESSION['user'] = $user;
    }

    public function getCurrentUser(){
        return $_SESSION['user'];
    }

    public function setSessionTemp($usertemp){
        $_SESSION['usertemp'] = $usertemp;
    }

    public function getSessionTemp(){
        return $_SESSION['usertemp'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}

