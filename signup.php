<?php
// Database connection
$servername = "localhost"; // Change to your MySQL server address
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$database = "digi"; // Change to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user details from the form submission
$username = $_POST['username'];
$password = $_POST['password']; // Note: In a production environment, you should hash the password for security.
$email = $_POST['email'];

// Prepare SQL statement to insert user into the database
$sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "User registered successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>