<?php
// signup_process.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$gebruikersnaam = $_POST['gebruikersnaam'];
$wachtwoord = $_POST['wachtwoord'];

// Check if username exists
$sql = "SELECT * FROM users WHERE gebruikersnaam = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $gebruikersnaam);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Username exists, redirect to error page
    header("Location: signup_error.html");
    exit();
} else {
    // Username does not exist, insert new user
    $sql = "INSERT INTO users (gebruikersnaam, wachtwoord) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $gebruikersnaam, password_hash($wachtwoord, PASSWORD_DEFAULT));
    $stmt->execute();
    
    // Redirect to success page or login page
    header("Location: login.php");
    exit();
}


$conn->close();
?>
