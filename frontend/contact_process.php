<?php
// Database verbinding
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Contactgegevens verwerken
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $bericht = $_POST['bericht'];

    $sql = "INSERT INTO contacten (naam, email, bericht) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $naam, $email, $bericht);

    if ($stmt->execute()) {
        echo "Bericht succesvol opgeslagen.";
    } else {
        echo "Er is een fout opgetreden bij het opslaan van het bericht.";
    }

    $stmt->close();
}

$conn->close();
?>
