<?php 
$title="Home";
require_once "includes/header.php" ;
require_once "DB/conn.php";

$results = $crud->getSpecialties();
?>
    <!-- when we press the submit , some action will done and it goes to next page to action and for that we used method attribute -->
    <h1><p class="text-center">Registration for IT Conference</p></h1>
    <form method="post" action="Success.php"> 
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date Of Birth</label>
            <input required type="text" class="form-control" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="speciality" >Area of Expertise</label>

            <!-- <datalist id="datalistOptions"> -->
                <select required class="form-control" id="speciality" name="speciality">
                    <?php while($r=$results->fetch(PDO::FETCH_ASSOC)){?>
                        <option value="<?php echo $r['Speciality_id'] ?>"><?php echo $r['name']; ?></option>
                    <?php }?>
                </select>
            <!-- </datalist> -->
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input required type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your Number with anyone else.</div>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        </div>
    </form>
<?php require_once "includes/footer.php" ?>


   