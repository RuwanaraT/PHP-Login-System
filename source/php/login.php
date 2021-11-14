<?php

// link the configuration file
require('./config/db.php');

// start the session variable 
session_start();

// check whether the login button containing values
if(isset($_POST['login'])) {

    // create variables and access the values which are instered by keyboard using post method and name attribute
    // at the same time sanitize sensitive values for security purposes
    $EmailAddress = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $Password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

    // select query
    $stmt = $pdo -> prepare("SELECT * FROM user WHERE email = ?");

    // execute the select query
    $stmt -> execute([$EmailAddress]);

    // fetch the particular data set that matches with given email address
    $user = $stmt -> fetch();

    // if the user exsists
    if(isset($user)) {

        // decrypt the password
        if(password_verify($Password, $user -> pwd)) {

               // create the session variable and assign the user id(pk) for it
               $_SESSION['id'] = $user -> id;

               // pop up alert message regadring login successful and redirect to the userProfile.php page
               echo ("<script> 
               window.alert('Login is successful !');
               window.location.href = 'userProfile.php';      
               </script>");

        }

        // if the user is not exsists
         else {

            // pop up alert message regadring login unsuccessful and redirect to the login.html page
            echo ("<script> 
            window.alert('Email Address or Password is Wrong !');
            window.location.href = '../login.html';      
            </script>");

         }
    }
}

?>