<?php
include_once 'model/user.php';
include_once 'model/user_session.php';
include_once 'model/otp.php';

$userSession = new UserSession();
$user = new User();
$otp = new Otp();

if(isset($_SESSION['user'])) {
    $user->setUser($userSession->getCurrentUser());
    header("location: home.php");
}elseif (isset($_POST['email']) && isset($_POST['password'])) {

    $userForm = $_POST['email'];
    $passForm = $_POST['password'];

    if ($user->verifyUser($userForm, $passForm)) {

//        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        if ($otp->getEnableCode($user->getEmail())){
            $userSession->setSessionTemp($userForm);
            header("location: verify_otp.php");
        }else{
            $userSession->setCurrentUser($userForm);
            header("location: home.php");
        }

    } else {
        $errorLogin = "Email o password incorrecto";
        include_once 'views/login.php';
    }
}else{
    include_once 'views/login.php';
}

