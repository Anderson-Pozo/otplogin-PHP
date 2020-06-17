<?php
include_once 'config.php';

class Database{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct()
    {
        $this->host = HOST;
        $this->db = DB;
        $this->user = USER;
        $this->password = PASSWORD;
        $this->charset = 'utf8mb4';
    }

    function connectDatabase(){
        try{
            $connectionString = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            return new PDO($connectionString,$this->user,$this->password);
        }catch (PDOException $e){
            print_r('Error connection' . $e->getMessage());
        }
    }
}