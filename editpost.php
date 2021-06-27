<?php 
require_once "includes/auth_check.php";
require_once "DB/conn.php";
// get values from post operation
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $speciality = $_POST['speciality'];

    // calling crud function 
    $issuccess = $crud->updateAttendees($id,$fname,$lname,$dob,$email,$contact,$speciality);
    //Redirect to index.php
    if($issuccess){
        header("Location: viewrecords.php");
    }
    else{
        include 'includes/error.php';

    }

}
else{
    include 'includes/error.php';

}






?>