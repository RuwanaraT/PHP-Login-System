<?php

// link the configuration file
require('./config/db.php');

// start the session variable
session_start();

// check whether the session variable containg unique id
if(isset($_SESSION['id'])) {

    // create variable and assign the session variable value(id)
    $userId = $_SESSION['id'];

    // select query
    $stmt = $pdo -> prepare("SELECT * FROM user WHERE id = ?");
    // execute select query
    $stmt -> execute([ $userId]);

    // check whether the update button containing values
    if(isset($_POST['edit'])) {

    // create variables and access the updated values and other values using post method and name attribute
    // at the same time sanitize sensitive values for security purposes
        $FullName = filter_var($_POST["one"], FILTER_SANITIZE_STRING);
        $Address = filter_var($_POST["two"], FILTER_SANITIZE_STRING);
        $NIC = filter_var($_POST["three"], FILTER_SANITIZE_STRING);
        $PhoneNumber = filter_var($_POST["four"], FILTER_SANITIZE_STRING);
        $EmailAddress = filter_var($_POST["five"], FILTER_SANITIZE_EMAIL);
        $BirthDay = $_POST["six"];

        // update query
        $updatequery = $pdo -> prepare("UPDATE user SET fullname=?, address=?, nic=?, phonenumber=?, email=?, birthday=? WHERE id=?");
        // execute update query
        $updatequery -> execute([$FullName, $Address,   $NIC, $PhoneNumber, $EmailAddress, $BirthDay, $userId]);
    }

    // fetch the particular data set that matches with given user id
    $user = $stmt -> fetch();


}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!------ bootstrap css link ------>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>My Account</title>

    <!------ external css & js links ------>

    <link rel = "stylesheet" href = "../css/style.css">
    <link rel = "stylesheet" href = "../css/userProfile.css">
    <script src = "js/"> </script>
    
    <!------ display shortcut icon ------>
    <link rel = "shortcut icon" href = "../images/">

</head>

<body>

<nav>
    <h3>PHP-Login-System</h3>
    <ul>
      <li><a href="../home.html" style="text-decoration: none;">Home</a></li>
      <li><a href="#" style="text-decoration: none;">Profile</a></li>
      <li><a href="logout.php" style="text-decoration: none;">Logout</a></li>
    </ul>
  </nav>


  <!-- Pop up Modal for Delete Button -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post" action="delete.php">

      <div class="modal-body">

      <!-- hidden text box -->
      <input type="hidden"  id="delid" name="delid">

      <h4> Do you want delete this Account ?? </h4>
        
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-danger" name="deletedata">Yes !! Delete it.</button>
      </div>

      </form>

    </div>
  </div>
</div>

    <div class = "container">

        <br><br>

        <div class="card bg-light mb-3">

          <div class="card-header">

        <center><h1>My Account</h1></center>

          </div>

          <div class="card-body">

    <form method="post" action="userProfile.php">

        <img src = "../images/pp.png" class = "ProPic">

        <hr> 

        <div class="row">
            <div class="col">
              <input type="hidden" class="form-control" id = "hid" name="hid" value="<?php echo $user -> id?>">
            </div>
          </div> 
             
          <div class="row">
            <div class="col">
              <label for="one" class = "lbl">Full Name</label>
            </div>
            <div class="col">
              <input type="text" class="form-control" id = "one" name = "one"  value="<?php echo $user -> fullname?>">
            </div>
          </div> 

          <hr>
             
          <div class="row">
            <div class="col">
              <label for="two" class = "lbl">Address</label>
            </div>
            <div class="col">
              <input type="text" class="form-control" id = "two" name = "two" value="<?php echo $user -> address ?>">
            </div>
          </div> 

          <hr>

          <div class="row">
            <div class="col">
              <label for="three" class = "lbl">NIC Number</label>
            </div>
            <div class="col">
              <input type="text" class="form-control" id = "three" name = "three" value="<?php echo $user -> nic ?>">
            </div>
          </div> 

          <hr>

          <div class="row">
            <div class="col">
              <label for="four" class = "lbl">Phone Number</label>
            </div>
            <div class="col">
              <input type="text" class="form-control" id = "four" name = "four" value="<?php echo $user -> phonenumber ?>">
            </div>
          </div> 

          <hr>

          <div class="row">
            <div class="col">
              <label for="four" class = "lbl">Email Address</label>
            </div>
            <div class="col">
              <input type="text" class="form-control" id = "five" name = "five" value="<?php echo $user -> email ?>">
            </div>
          </div> 

          <hr>

          <div class="row">
            <div class="col">
              <label for="five" class = "lbl">Birth Date</label>
            </div>
            <div class="col">
              <input type="text" class="form-control" id = "six" name = "six" value="<?php echo $user -> birthday ?>">
            </div>
          </div> 

          <hr>

          <button type="submit" class="btn btn-success" id="edit" name="edit">Update Account</button>
          
          <button type="button" class="btn btn-danger deletebtn">Delete Account</button>
          

        <br><br>

      </form>

</div>
</div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script> 

      $(document).ready(function () {

        // function for Delete Account button
        $('.deletebtn').on('click', function () {

          // when click on the Delete Account button pop up the modal
          $('#deletemodal').modal('show');

          // access My Account form's the hiden text box value
          var id = $('#hid').val();
          
          // pass the value to pop up modal's hidden text box
          $('#delid').val(id);

        });
      });

    </script>


</body>
</html>
