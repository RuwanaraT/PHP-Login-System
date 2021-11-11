<?php

// link the configuration file
require('./config/db.php');

session_start();

if(isset($_POST['login'])) {

    $EmailAddress = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $Password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

    $stmt = $pdo -> prepare("SELECT * FROM user WHERE email = ?");
    $stmt -> execute([$EmailAddress]);
    $user = $stmt -> fetch();

    if(isset($user)) {

        if(password_verify($Password, $user -> pwd)) {

               $_SESSION['id'] = $user -> id;
               echo ("<script> 
               window.alert('Login is successful !');
               window.location.href = 'userProfile.php';      
               </script>");

        }

         else {

            echo ("<script> 
            window.alert('Email Address or Password is Wrong !');
            window.location.href = '../login.html';      
            </script>");

         }
    }
}

?>