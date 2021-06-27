<?php 
    class crud{
        // private database object
        private $db;

        // constructor to initialize private to the database connection
        function __construct($conn){
            $this->db=$conn;
        }
        // inserting the data when press submit button into the database
        public function insertAttendees($fname, $lname, $dob, $email, $contact, $speciality){
                try {
                    //define sql statement to be executed
                    $sql = "INSERT INTO attendee (firstname, lastname, DOB, EmailAddress, ContactNumber, Speciality_id) VALUES (:fname, :lname, :dob, :email, :contact, :speciality)";
                    //prepare the sql statement for execution
                    $stmt = $this->db->prepare($sql); // stmt is an object of db
                    //bind all placeholders to the actual values
                    $stmt->bindparam(":fname",$fname); // stmt calling with function
                    $stmt->bindparam(":lname",$lname);
                    $stmt->bindparam(":dob",$dob);
                    $stmt->bindparam(":email",$email);
                    $stmt->bindparam(":contact",$contact);
                    $stmt->bindparam(":speciality",$speciality);
                    // execute statement
                    $stmt->execute();
                    return true;
                } catch (PDOException $e) {
                    echo $e->getmessage(); // e is an object of PDOException
                    return false;
                }
        }
        public function updateAttendees($id, $fname, $lname, $dob, $email, $contact, $speciality){
           try{
                    $sql = "UPDATE `attendee` SET `firstname`= :fname,`lastname`=:lname,`DOB`= :dob,`EmailAddress`=:email,`ContactNumber`=:contact,`Speciality_id`=:speciality WHERE Attendee_ID =:id";
                    $stmt = $this->db->prepare($sql); // stmt is an object of db
                    //bind all placeholders to the actual values
                    $stmt->bindparam(":id",$id); 
                    $stmt->bindparam(":fname",$fname); // stmt calling with function
                    $stmt->bindparam(":lname",$lname);
                    $stmt->bindparam(":dob",$dob);
                    $stmt->bindparam(":email",$email);
                    $stmt->bindparam(":contact",$contact);
                    $stmt->bindparam(":speciality",$speciality);

                    $stmt->execute();
                    return true;
           }catch(PDOException $e){
            echo $e->getmessage(); // e is an object of PDOException
            return false;
           }
        }
        public function getAttendees(){
            try{
                $sql = "SELECT * FROM `attendee` a inner join speciality_id s on a.Speciality_id = s.Speciality_id";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getmessage(); // e is an object of PDOException
                return false;
               }
        }
        public function getSpecialties(){
            try{
                $sql = "SELECT * FROM `speciality_id`";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getmessage(); // e is an object of PDOException
                return false;
            }
            
        }
        
        public function getAttendeeDetails($id){
            try{
                $sql = "SELECT * FROM `attendee` a inner join speciality_id s on a.Speciality_id = s.Speciality_id where Attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOException $e){
                echo $e->getmessage(); // e is an object of PDOException
                return false;
            }
            
        }

        public function deleteAttendee($id){
           try{
            $sql = "delete from attendee where Attendee_ID = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            return true;
           }catch(PDOException $e){
            echo $e->getmessage(); // e is an object of PDOException
            return false;
           }
        }
        public function getSpecialtyById($id){
            try{
                $sql = "SELECT * FROM `speciality_id` where Speciality_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }
    }

?>