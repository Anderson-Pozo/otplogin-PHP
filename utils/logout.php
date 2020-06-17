<?php
include_once '../lib/db.php';
include_once '../model/user_session.php';
include_once '../model/otp.php';

$userSession = new UserSession();
$otp = new Otp();

//$otp->updateUserOtp($userSession->getCurrentUser(), null);

$userSession->closeSession();
header("location: ../index.php");