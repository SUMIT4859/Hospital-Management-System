<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP/WAMP
$password = ""; // Default password is empty for XAMPP/WAMP
$dbname = "user_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
