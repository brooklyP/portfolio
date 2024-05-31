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
        $fotoBase64 = base64_encode($fotoContent);

        // Prepare SQL statement
        $sql = "INSERT INTO werk_inhoud (knop_id, foto, tekst) VALUES (?, ?, ?)
                ON DUPLICATE KEY UPDATE foto = VALUES(foto), tekst = VALUES(tekst)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $knop_id, $fotoBase64, $tekst);

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_dashboard.css">
</head>
<body>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <form action="admin_dashboard.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="knop_id">Knop ID</label>
                <input type="number" id="knop_id" name="knop_id" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" id="foto" name="foto" required>
            </div>
            <div class="form-group">
                <label for="tekst">Tekst</label>
                <textarea id="tekst" name="tekst" required></textarea>
            </div>
            <button type="submit">Opslaan</button>
        </form>
    </div>
</body>
</html>
