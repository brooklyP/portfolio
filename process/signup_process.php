<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO gebruikers (gebruikersnaam, wachtwoord) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $gebruikersnaam, $wachtwoord);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
