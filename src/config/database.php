<?php



class db{
    private $host = 'localhost';
    private $dbUser = 'root';
    private $password = '';
    private $dbName = '';


    private function getPath(){
        return "mysql:host=$this->$host;dbname=$this->$dbName";
    }

    public function connect(){
        $conn = new PDO($this->$getPath() , $this->$dbUser, $this->$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERR_MODE_EXCEPTION);
        return $conn;
    }

}