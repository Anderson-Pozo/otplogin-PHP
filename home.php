<?php
include_once 'model/user_session.php';
include_once 'model/user.php';

$userSession = new UserSession();
$user = new User();

$user->setUser($userSession->getCurrentUser());

if (isset($_SESSION['user'])){
    include_once 'views/home.php';
}else{
    header("location: index.php");
}
//include_once 'views/home.php';




