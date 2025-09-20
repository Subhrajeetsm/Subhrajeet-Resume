<?php
$servername = "localhost";     // or your host
$username = "root";            // DB username
$password = "krish@123";                // DB password
$database = "portfolio_db";    // DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>