<?php 
//define namespace
 namespace App;

 //use onther class 
 use App\Db as Db;

//define user class 
class User {
    private $userId;
    //db object holder
    private $db;
    function __construct($userId ,Db $db) {
        $this->db = $db;
        $this->userId = $userId ;
    }
    function getUser(){
        //use db class method to show user
        return $this->db->show('users','id',$this->userId);
    }
}

?>