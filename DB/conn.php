<?php
    // It is a development connection
    // $host = 'localhost'; // we use address also - "127.0.0.1"
    // $db = 'attendence_db';
    // $user = 'root';
    // $pass = ''; //password 
    // $charset = 'utf8mb4'; //it is standard

    // it is for Remote Database connection
    $host = 'remotemysql.com'; // we use address also - "127.0.0.1"
    $db = 'MGU42Is3F6';
    $user = 'MGU42Is3F6';
    $pass = 'nUZ47Cs3dj'; //password 
    $charset = 'utf8mb4'; //it is standard

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset"; //it is a terminology is used in PDO connectivity .so, it's a way that it connects to the database is just another engine.


    //mysql is type of datebase driver we have declare in dsn
    try{
        //it attempts to do that something here 
        // now try to connect the database
        $pdo = new PDO($dsn, $user, $pass);
        // there is no error
        // echo "Hello DataBase";
        // now we are setting the attributes to the object PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) { // we are get PDO error,then here it will catch the error and then stored all the details of the error in variable $e
        // if try is fails, then this part will part will run.
        // throw , it means it's going to stop all the execution and just diplay an error
        throw new PDOException($e->getMessage()); // now e is an object and it has functionalities as getMessage() to display an error.
        
    }
    require_once 'crud.php';
    $crud =new crud($pdo); //creating an object crud to class crud

?>