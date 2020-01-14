<?php

require_once "config.php";

class Database {
    private $username;
    private $password;
    private $host;
    private $database;

    public function __construct()
    {
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->host = HOST;
        $this->database = DATABASE;
    }

    public function connect()
    {

        //echo 'Trying to connect: ' . $this->username . ' ' . $this->password . ' ' . $this->host . ' ' . $this->database . '<br>';
        try {
            $conn = new PDO(
                "mysql:host=$this->host;dbname=$this->database", 
                $this->username,
                $this->password
            );
            echo 'conn1<br>';
           
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}