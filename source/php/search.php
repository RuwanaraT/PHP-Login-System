<?php

// link the configuration file

require('./config/db.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!------ bootstrap css link ------>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Search</title>

    <!------ external css & js links ------>

    <link rel = "stylesheet" href = "../css/style.css">
    <link rel = "stylesheet" href = "../css/userProfile.css">
    <script src = "../js/search.js"> </script>
    
    <!------ display shortcut icon ------>
    <link rel = "shortcut icon" href = "../images/">

</head>

<body>

<nav>
    <h3>PHP-Login-System</h3>
    <ul>
      <li><a href="../home.html" style="text-decoration: none;">Home</a></li>
      <li><a href="../registrationForm.html" style="text-decoration: none;">Register</a></li>
      <li><a href="../login.html" style="text-decoration: none;">Login</a></li>
    </ul>
  </nav>

  <div class = "container">

  <br><br>

        <div class="card bg-light mb-3">

        <div class="card-header">
        <center><h1>Search for Users</h1></center>
        </div>

        <div class="card-body">


  <input class="form-control me-2" type="search" placeholder="Search by name..." aria-label="Search" id="search" name="search" onkeyup="searchBuyers()">
  

  <?php

      $readquery = $pdo -> prepare("SELECT * FROM user");
      $readquery -> execute();
      $rowCount = $readquery -> rowCount();


      if($rowCount > 0) {

        echo "<table class='table' id='searchTable'>";

        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'>#</th>";
        echo "<th scope='col'>Full Name</th>";
        echo "<th scope='col'>Address</th>";
        echo "<th scope='col'>NIC Number</th>";
        echo "<th scope='col'>Contact Number</th>";
        echo "<th scope='col'>Email Address</th>";
        echo "<th scope='col'>Gender</th>";
        echo "<th scope='col'>Bith Date</th>";
        echo "</tr>";
        echo "</thead>";

        echo "<tbody>";

        // $rowCount->fetch_assoc()

        while($row = $readquery -> fetch()) {

       echo "<tr class='table-info'>";
       echo " <td>{$row -> id}</td>";
       echo " <td>{$row -> fullname}</td>";
       echo " <td>{$row -> address}</td>";
       echo " <td>{$row -> nic}</td>";
       echo " <td>{$row -> phonenumber}</td>";
       echo " <td>{$row -> email}</td>";
       echo " <td>{$row -> gender}</td>";
       echo " <td>{$row -> birthday}</td>";
       echo "</tr>"; 

        }

        echo "</tbody>";
        echo "</table>";

      }

      else {
          echo "No result";
      }

      // $conn->close();

  ?>
    
</div>

</div>

</body>
</html>
