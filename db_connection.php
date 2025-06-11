<?php
// Database connection details
$servername = "localhost";  // Database server (usually localhost for XAMPP)
$username = "root";         // Database username (default is 'root' for XAMPP)
$password = "";             // Database password (default is empty for XAMPP)
$dbname = "expense_system"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "";
}
?>
