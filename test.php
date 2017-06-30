<?php
$servername = "192.168.101.146";
$username = "euromat0_admin";
$password = "admin123!";
$database = "euromat0_FindMeRide";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql = "SELECT id_user as id, name as firstname, username as lastname FROM Users where username = 'euromat'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo $row["id"];

$conn->close();


?>