<?php

class Database{
    private $server_name = "localhost";
    private $username    = "root";
    private $password    ="";
    private $db_name     ="sales_oop";
    protected $conn;

    public function __construct()
    {
         $this->conn = new mysqli($this->server_name,$this->username,$this->password,$this->db_name);
         //$this->conn holds the connection to the database

         //CHECK CONNECTION
         if($this->conn->connect_error){
            die("Unable to connect to the database:". $this->conn->connect_error);
         }
    }
}
?>