<?php
    //add autoload file
    require "./vendor/autoload.php";
    
     //add database config
    require ('config.php');

    //use classes
    use App\User as User;
    use App\Db as Db;
    
    //check if mysql connect define new object of db and user
    if($sqlObject= new mysqli(SERVERNAME, DBUSERNAME, DBPASSWORD, DBNAME))
    {
        $db = new Db($sqlObject);
        $user = new User('1',$db);
    }else {
        //when mysql has error stop running code
        die('connect database failed');
    }

    //get user info
    $fields=$user->getUser();
    //show an array data
    print_r($fields);


?>