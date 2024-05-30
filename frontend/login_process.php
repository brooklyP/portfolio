<?php
// login_process.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];

    $sql = "SELECT id, wachtwoord FROM gebruikers WHERE gebruikersnaam = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $gebruikersnaam);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($wachtwoord, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['gebruikersnaam'] = $gebruikersnaam;

        header("Location: admin_dashboard.php"); // Redirect to admin dashboard
        exit();
    } else {
        header("Location: login.php?error=invalidcredentials"); // Redirect to login page with error message
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
