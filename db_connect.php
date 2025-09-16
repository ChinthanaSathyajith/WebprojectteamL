<?php
$servername = "sql102.infinityfree.com";
$username = "if0_39955723";
$password = "webprojectteaml";
$dbname = "if0_39955723_webproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
