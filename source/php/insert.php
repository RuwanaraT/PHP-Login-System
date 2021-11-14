<?php

// link the configuration file
require('./config/db.php');

// check whether the submit button containing values
if(isset($_POST['submit'])) {

    // create variables and access the values which are instered by keyboard using post method and name attribute
    // at the same time sanitize sensitive values for security purposes
$FullName = filter_var($_POST["fname"], FILTER_SANITIZE_STRING);
$Address = filter_var($_POST["address"], FILTER_SANITIZE_STRING);
$NIC = filter_var($_POST["nic"], FILTER_SANITIZE_STRING);
$PhoneNumber = filter_var($_POST["pnumber"], FILTER_SANITIZE_STRING);
$EmailAddress = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

$Gender = $_POST["gender"];
$BirthDay = $_POST["bdy"];

$Password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

// encrypt password before insert into the database
$hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

$Checks = implode(",", $_POST["check"]);

// validate email address
if(filter_var($EmailAddress, FILTER_VALIDATE_EMAIL)) {

    // select query
    $stmt = $pdo -> prepare("SELECT * FROM user WHERE email = ?");
    // execute the select query
    $stmt -> execute([$EmailAddress]);
    // get the row count which has same email address as given email address
    $totalUser = $stmt -> rowCount();

    // if the email is already existing
    if($totalUser > 0) {

        // pop up alert message regadring error and redirect to the login.html page
        echo ("<script> 
        window.alert('Email already has been taken !');
        window.location.href = '../registrationForm.html';      
        </script>");

    }
    else {

        // insert query for insert data into user table
        $insertquery = $pdo -> prepare("INSERT INTO user(fullname, address, nic, phonenumber, email, gender, birthday, pwd, checks) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        // excute the insert query
        $insertquery -> execute([$FullName, $Address, $NIC, $PhoneNumber, $EmailAddress, $Gender, $BirthDay, $hashedPassword, $Checks]);

        // pop up alert message regarding registration Successful and redirect to the login.html page
        echo ("<script> 
        window.alert('Registration is Successful');
        window.location.href = '../home.html';      
        </script>");

    }
}

}

?>