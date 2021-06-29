<?php
$servername = "database";
$username = "preg";
$password = "asddva8439hefe4j";
$dbname = "anht0ictf01";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
