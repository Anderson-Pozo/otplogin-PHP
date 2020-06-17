<?php
include_once 'model/user.php';
include_once 'model/user_session.php';
include_once 'model/otp.php';
include_once 'utils/phone_number.php';
include_once 'utils/send_messages.php';

$userSession = new UserSession();
$user = new User();
$otp = new Otp();


if (isset($_SESSION['user'])){
    header("location: home.php");
}

//if (!isset($_SESSION['usertemp'])){
//    header("location: index.php");
//}

if (isset($_SESSION['usertemp'])){
    $user->setUser($userSession->getSessionTemp());
}else{
    header("location: index.php");
}

if (isset($_POST['phone'])){

    $phone_number = $_POST['phone'];
    $code_otp = $otp->generateOtp();
    $phone_number = PhoneNumber::process_phone_number($phone_number);

    try {
        TwilioMessage::sendMessage($code_otp, $phone_number);
        $message = "Código enviado a tu celular. Revisa tu bandeja de entrada";
        $otp->updateUserOtp($user->getEmail(), $code_otp);

    }catch (Exception $e){
        echo $e->getMessage();
    }
    include_once 'views/verify_otp.php';
}elseif(isset($_POST['codigotp'])){

    $otpForm = $_POST['codigotp'];

    if ($otp->verifyOtpUser($user->getEmail(), $otpForm)){

        $userSession->setCurrentUser($user->getEmail());
        header("location: home.php");
    }else{
        $errorCode = "El codigo ingresado no coincide";
        include_once 'views/verify_otp.php';
    }

} else{
    include_once 'views/verify_otp.php';
}
