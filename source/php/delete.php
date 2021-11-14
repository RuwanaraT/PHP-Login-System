<?php

// link the configuration file
require('./config/db.php');

    // check whether the Yes !! Delete it. button containing values
    if(isset($_POST['deletedata'])) {

        // create variable and access the value which is on the hidden text box
        $userId = $_POST['delid'];

        // delete query for delete data from the database
        $deletequery = $pdo -> prepare("DELETE FROM user WHERE id = ?");
        // excute the delete query
        $deletequery -> execute([$userId]);

        // pop up alert message regadring deletion successful and redirect to the home.html page
        echo ("<script> 
        window.alert('Deletion is Successful');
        window.location.href = '../home.html';      
        </script>");

    }


?>