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


    // public function select($id){
    //     $sql = "SELECT * FROM users WHERE users.ID == $id"
    // }

    // $user.select(1)
    // $user.delete(1)
    // $user.update(1)
    // $user.insert(1)
}