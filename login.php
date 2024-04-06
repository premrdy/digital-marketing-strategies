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

// Retrieve username and password from form submission
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare SQL statement to retrieve user from database
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

// Execute SQL statement
$result = $conn->query($sql);

// Check if there is a user with the provided username and password
if ($result->num_rows > 0) {
    // User authentication successful
    session_start();
    $_SESSION['username'] = $username; // Store username in session for future use
    header("Location: dashboard.php"); // Redirect to dashboard or home page
} else {
    // User authentication failed
    echo "Invalid username or password. Please try again.";
}

$conn->close();
?>