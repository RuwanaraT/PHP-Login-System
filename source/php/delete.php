<?php

// link the configuration file
require('./config/db.php');

    if(isset($_POST['deletedata'])) {

        $userId = $_POST['delid'];

        $deletequery = $pdo -> prepare("DELETE FROM user WHERE id = ?");
        $deletequery -> execute([$userId]);

        echo ("<script> 
        window.alert('Deletion is Successful');
        window.location.href = '../home.html';      
        </script>");

    }


?>