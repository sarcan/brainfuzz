<?php
/* Database Connection */
$servername = "localhost";
$dbname = "brainfuzz";
$username = "root";
$password = "root";
 
try {
      $connection = new PDO (
        "mysql:host=$servername;dbname=$dbname",
        $username, $password );
   
      // Set the PDO error mode
      // to exception
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error) {
      echo "Connection failed: " . $error->getMessage();
}

?>