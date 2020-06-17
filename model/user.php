<?php
include_once 'lib/db.php';
include_once 'utils/encrypted_password.php';
include_once 'utils/phone_number.php';

class User extends Database{
    private $nombre;
    private $apellido;
    private $email;

    function __construct()
    {
        parent::__construct();
    }

    public function setUser($email){
        $query = "SELECT * FROM users WHERE email = :email";
        $result = $this->connectDatabase()->prepare($query);
        $result->execute(array(":email" => $email));

        foreach ($result as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->apellido = $currentUser['apellido'];
            $this->email = $currentUser['email'];
        }
    }

    public function getName(){
        return $this->nombre . " " .  $this->apellido;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getAllUsers(){
        $query = $this->connectDatabase()->query('SELECT id, nombre, apellido, email FROM users');

        $items = [];

        while ($row = $query->fetch(PDO::FETCH_ASSOC)){
            $item = [
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'apellido' => $row['apellido'],
                'email' => $row['email'],
            ];
            array_push($items, $item);
        }
        return $items;
    }

    public function createUser($nombre, $apellido, $email, $password){

        $encrypted_password = Password::generatePasswordHash($password);
        $username = strtolower($nombre) . "." . strtolower($apellido);
        $defaultEnabledCode = 1;

        $query = "INSERT INTO users(nombre, apellido, password, email, username, enablecode) 
                  VALUES (:nombre, :apellido, :password, :email, :username, :enacode)";
        try {
            $result = $this->connectDatabase()->prepare($query);
            $result->execute(array(":nombre" => $nombre, ":apellido" => $apellido, ":password" => $encrypted_password, ":email" => $email,
                ":username" => $username, ":enacode" => $defaultEnabledCode));
            return true;
        }catch (Exception $e){
            die("Error " . $e->getMessage());
        }
    }

    public function verifyUser($email, $password){
        $count = 0;
        $query = "SELECT * FROM users WHERE email = :email";

        $result = $this->connectDatabase()->prepare($query);
        $result->execute(array(":email" => $email));

        while($register = $result->fetch(PDO::FETCH_ASSOC)){
           (PASSWORD::verifyPasswordHash($password, $register["password"])) ? $count++ : null ;
        }

        if ($count>0){
            return true;
        }else{
            return false;
        }
    }

    public function verifyIfUserExits($email){

        $query = "SELECT email FROM users WHERE email = :email";

        $result = $this->connectDatabase()->prepare($query);
        $result->execute(array(":email" => $email));
        $count = $result->rowCount();

        if ($count > 0){
            return true;
        }else{
            return false;
        }
    }

}

