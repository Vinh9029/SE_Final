<?php
// Database connection settings
$host = 'localhost'; //localhost
$db   = 'theoldfavour';
$user = 'shopuser'; //root
$pass = '1234'; //No password
//test

// Create connection
$conn = new mysqli($host, $user, $pass, $db, 3307); // Port 3307 for XAMPP, 3306 for WAMP

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>