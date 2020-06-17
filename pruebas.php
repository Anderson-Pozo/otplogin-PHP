<?php
include_once 'model/user.php';
$user = new User();
//            $response = json_decode(file_get_contents('http://localhost/otp-php/api/user_api.php?category=users'), true);

$response =  $user->getAllUsers();

//$json = json_decode($user->getAllUsers());
//
//$response = $json;
            if($response['statuscode'] == 200){
                foreach($response['items'] as $item){
                    echo $item['email'];
                }
            }else{
                echo $response['response'];
            }
            ?>