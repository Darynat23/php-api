<?php

require('../config/database.php');

class user{
    public $firstname ;
    public $lastname;
}


class userDao{
    public function getUsers(){
        $sql = "SELECT * FROM users";
        try{
            $db = new db();
            $db = $db->$connect();


            $result = $db->query($sql);

            if($result->rowCount()> 0){
                return $result->fetchAll(PDO::FETCH_OBJ);
            }

        }catch(PDOException $e){
            echo '{"error": '.$e.getMessage().'}';
        }
    }
}
