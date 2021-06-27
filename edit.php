<?php 
$title="Edit Record";
require_once "includes/header.php" ;
require_once "includes/auth_check.php";
require_once "DB/conn.php";

$results = $crud->getSpecialties();
if(!isset($_GET['id'])){
    //echo 'ERROR';
    include 'includes/error.php';
    header("Location: viewrecords.php");
}
else{
    $id=$_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);

?>
    <!-- when we press the submit , some action will done and it goes to next page to action and for that we used method attribute -->
    <h1><p class="text-center">EDIT RECORD</p></h1>
    <form method="post" action="editpost.php"> 
    <input type="hidden" name ="id" value ="<?php echo $attendee['Attendee_ID'] ?>"/> 
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" value = "<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" value = "<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date Of Birth</label>
            <input type="text" class="form-control" value = "<?php echo $attendee['DOB'] ?>" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="speciality" >Area of Expertise</label>

            <!-- <datalist id="datalistOptions"> -->
                <select class="form-control" id="speciality" name="speciality">
                    <?php while($r=$results->fetch(PDO::FETCH_ASSOC)){?>
                        <option value="<?php echo $r['Speciality_id'] ?>" <?php if($r['Speciality_id'] == $attendee['Speciality_id']) echo 'selected' ?>>
                            <?php echo $r['name']; ?>
                        </option>
                    <?php }?>
                </select>
            <!-- </datalist> -->
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" value = "<?php echo $attendee['EmailAddress'] ?>" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" value = "<?php echo $attendee['ContactNumber'] ?>" id="phone" name="phone" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your Number with anyone else.</div>
        </div>
        <a href="viewrecords.php" class="btn btn-info btn">Back</a>
        <!-- <div class="d-grid gap-2"> -->
            
            <button class="btn btn-danger btn" type="submit" name="submit">Save & Change</button>
        <!-- </div> -->
    </form>

<?php } ?>
<?php require_once "includes/footer.php" ?>


   