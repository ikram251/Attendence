<?php

class user{
    // private database object
    private $db;

    // constructor to initialize private to the database connection
    function __construct($conn){
        $this->db=$conn;
    }

    public function insertuser($username,$password){
        try {
            $result = $this->getuserbyusername($username);
            if($result['num'] > 0){
                return false;
            }else{
                    $new_password = md5($password.$username); // md5 is for encryption and we are doing concatination becoz no password
                  //define sql statement to be executed
                    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
                    //prepare the sql statement for execution
                    $stmt = $this->db->prepare($sql); // stmt is an object of db
                    //bind all placeholders to the actual values
                    $stmt->bindparam(":username",$username); // stmt calling with function
                    $stmt->bindparam(":password",$new_password);
                    // execute statement
                    $stmt->execute();
                    return true;
            }
          
        } catch (PDOException $e) {
            echo $e->getmessage(); // e is an object of PDOException
            return false;
        }
    }
    public function getuser($username,$password){
        try{
            $sql = "SELECT * FROM `users` where username=:username AND password = :password";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":username",$username); // stmt calling with function
            $stmt->bindparam(":password",$password);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }catch(PDOException $e){
            echo $e->getmessage(); // e is an object of PDOException
            return false;
        }
        
    }
    public function getuserbyusername($username){
        try{
            $sql = "SELECT count(*) as num from `users` where username=:username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":username",$username); // stmt calling with function
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }catch(PDOException $e){
            echo $e->getmessage(); // e is an object of PDOException
            return false;
        }
    }
}
?>