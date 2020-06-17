<?php
include_once 'lib/db.php';
include_once 'utils/encrypted_password.php';

class Otp extends Database{

    function __construct()
    {
        parent::__construct();
    }

    public function generateOtp(){
        $generator = "1234567890";
        $result = "";

        for ($i = 1; $i <= 6; $i++) {
            $result .= substr($generator, (rand()%(strlen($generator))), 1);
        }
        return $result;
    }

    public function generateOtpWithRand(){
        return rand(100000,999999);
    }

    public function updateUserOtp($email, $code){
        $query = "UPDATE users SET codeotp = :code WHERE email = :email";

        try {
            $result = $this->connectDatabase()->prepare($query);
            $result->execute(array(":code" => $code, ":email" => $email));
            return true;
        }catch (Exception$e){
            die("Error" . $e->getMessage());
        }
    }

    public function verifyOtpUser($email, $input_code){
        $query = "SELECT codeotp FROM users WHERE email = :email";

        $result = $this->connectDatabase()->prepare($query);
        $result->execute(array(":email" => $email));

        $row = $result->fetch(PDO::FETCH_ASSOC);
        $codeuser = $row["codeotp"];

        if ($input_code){
            if ($input_code == $codeuser){
                return true;
            }else{
                return false;
            }
        }else{
            return "Input empty";
        }
    }

    public function getEnableCode($email){
        $query = "SELECT enablecode FROM users WHERE email = :email ";

        $result = $this->connectDatabase()->prepare($query);
        $result->execute(array(":email" => $email));

        $row = $result->fetch(PDO::FETCH_ASSOC);
        $enableCode = (int) $row["enablecode"];

        return $enableCode;
    }
}