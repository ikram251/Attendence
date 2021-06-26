<?php 
require_once "db/conn.php";

if(!$_GET['id']){
    include 'includes/error.php';
}
else{
    // get ID values
    $id = $_GET['id'];

    // call delete function
    $result = $crud->deleteAttendee($id);

    // Redirect to list
    if($result){
        header("Location: viewrecords.php");
    }
    else{
        include 'includes/error.php';
    }

}
?>