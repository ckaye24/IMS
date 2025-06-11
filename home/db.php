<?php
$host = 'localhost';
$db = 'inventory_management_system'; // Replace with your database name
$user = 'root';     // Replace with your database username
$pass = '';      // Replace with your database password

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}?>
