<?php 
$title="View record";
require_once "includes/header.php" ;
require_once "db/conn.php";

// Get attendee by id
if(!isset($_GET['id'])){
    echo "<h1 class= 'text-danger'>Please Check Details and try agian</h1>";
    
}
else{
    $id = $_GET['id'];
    $result = $crud->getAttendeeDetails($id);

?>

<br>
<br>
<br>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
    <?php
        echo $result['firstname'].' '.$result['lastname'];
    ?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted">
    <?php 
        echo $result['name']
    ?>
    </h6>
    <p class="card-text">
        DOB: <?php echo $result['DOB']?>
    </p>
    <p class="card-text">
        Phone Number: <?php echo $result['ContactNumber']?>
    </p>
    <p class="card-text">
        Email Address: <?php echo $result['EmailAddress']?>
    </p>
    <p class="card-text">
        <p></p>
    </p>
  </div>
</div>
<br>
<br>
        <a href="viewrecords.php" class="btn btn-info">Back</a>
        <a href="edit.php?id=<?php echo $result['Attendee_ID']?>" class="btn btn-warning">Edit</a>
        <a onclick="return confirm('Are you sure you want to delete this record?')" href="delete.php?id=<?php echo $result['Attendee_ID']?>" class="btn btn-danger">Delete</a>
<?php } ?>

<?php require_once "includes/footer.php" ?>
