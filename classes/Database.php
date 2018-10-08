<?php

class Database{

    private $username = "root";
    private $password = "";
    private $servername = "localhost";
    private $database = "blog";

    public $conn;

    public function __construct(){
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        
        if($this->conn->connect_error){
            die("Connection error: " . $this->conn->connect_error);
        }
        return $this->conn;
    }

    public function success($msg){
        $notif = "<div class='alert alert-success'>". $msg ."</div>";
        return $notif;
    }
    public function info($msg){
        $notif = "<div class='alert alert-info'>". $msg ."</div>";
        return $notif;
    }
    public function danger($msg){
        $notif = "<div class='alert alert-danger'>". $msg ."</div>";
        return $notif;
    }
    public function warning($msg){
        $notif = "<div class='alert alert-warning'>". $msg ."</div>";
        return $notif;
    }
}