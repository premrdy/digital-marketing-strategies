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

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$company = $_POST['company'];
$industry = $_POST['industry'];
$message = $_POST['message'];
$services = implode(', ', $_POST['services']);

// Insert data into database
$sql = "INSERT INTO contact_form (name, email, company, industry, message, services) 
        VALUES ('$name', '$email', '$company', '$industry', '$message', '$services')";

if ($conn->query($sql) === TRUE) {
    echo "Thank you for contacting us!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>