<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

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
    $knop_id = $_POST['knop_id'];
    $tekst = $_POST['tekst'];
    $foto = '';

    // Handle file upload
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['foto']['tmp_name'];

        // Read file contents
        $fotoContent = file_get_contents($fileTmpPath);

        // Prepare SQL statement
        $sql = "INSERT INTO werk_inhoud (knop_id, foto, tekst) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $knop_id, $fotoContent, $tekst);

        // Execute SQL statement
        if ($stmt->execute()) {
            echo "Bestand succesvol opgeslagen in de database.";
        } else {
            echo "Er is een fout opgetreden bij het opslaan van het bestand in de database.";
        }

        $stmt->close();
    }
}

$conn->close();
?>
