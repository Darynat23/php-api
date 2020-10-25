<?php

class Db{
    private $host = 'localhost';
    private $dbUser = 'root';
    private $password = '1234';
    private $dbName = 'natkandlo';


    private function getPath(){
        return "mysql:host=$this->host;dbname=$this->dbName";
    }

    public function connect(){
        return new PDO($this->getPath() , $this->dbUser, $this->password);
    }
}