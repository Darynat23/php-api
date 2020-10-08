<?php



class db{
    private $host = 'localhost';
    private $dbUser = 'root';
    private $password = '1234';
    private $dbName = 'natkandlo';


    private function getPath(){
        return "mysql:host=$this->host;dbname=$this->dbName";
    }

    public function connect(){
        $conn = new PDO($this->getPath() , $this->dbUser, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERR_MODE_EXCEPTION);
        return $conn;
    }


    // public function select($id){
    //     $sql = "SELECT * FROM users WHERE users.ID == $id"
    // }

    // $user.select(1)
    // $user.delete(1)
    // $user.update(1)
    // $user.insert(1)
}