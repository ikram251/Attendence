<?php 
$title="Success";
require_once "includes/header.php" ;
require_once "DB/conn.php";
require_once "sendmail.php";

if(isset($_POST['submit'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $speciality = $_POST['speciality'];
    // call function to insert and track if it is success or not. 
    $issuccess = $crud->insertAttendees($fname,$lname,$dob,$email,$contact,$speciality);
    $specialtyName = $crud->getSpecialtyById($speciality);
    if($issuccess){
        SendEmail::SendMail($email,"Welcome to IT conference 2021","You successfully registered for this year\'s IT conference");
        echo '<h1><p class="text-center text-success">Registered Sucessfully.</p></h1>';
    }
    else{
        include 'includes/error.php';
    }
}
?>


<!-- <h1><p class="text-center text-success">Registered Sucessfully.</p></h1> -->
<!-- <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
    <?php
        //echo $_GET['firstname'].' '.$_GET['lastname'];
    ?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted">
    <?php 
        //echo $_GET['specialty']
    ?>
    </h6>
    <p class="card-text">
        DOB: <?php //echo $_GET['dob']?>
    </p>
    <p class="card-text">
        Phone Number: <?php //echo $_GET['phone']?>
    </p>
    <p class="card-text">
        Email Address: <?php //echo $_GET['email']?>
    </p>
    <p class="card-text">
        <p></p>
    </p>
  </div>
</div> -->
<?php
    // echo $_GET['firstname'].'<br>';
    // echo $_GET['lastname'].'<br>';
    // echo $_GET['dob'].'<br>';
    // echo $_GET['phone'].'<br>';


?>


<br>
<br>
<br>
<br>
<br>
<?php require_once "includes/footer.php" ?>