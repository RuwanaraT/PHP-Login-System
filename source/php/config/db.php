<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'rtrs';

// set DSN - Database Source Name

$dsn = 'mysql:host=' . $host .'; dbname=' . $dbname;

try {

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connection Successful";

}catch(PDOException $e) {

    echo "Connection Failed : " . $e->getMessage();
}

?>