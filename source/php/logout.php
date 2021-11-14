<?php

// start the session variable 
session_start();

// check whether the session variable containg unique id
if(isset($_SESSION['id'])) {

    // destroy the session
    session_destroy();

    // after destroying the session redirect to the home.html page
    header('Location: ../home.html');

}

?>