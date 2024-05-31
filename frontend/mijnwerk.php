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

$sql = "SELECT knop_id, foto, tekst FROM werk_inhoud";
$result = $conn->query($sql);

$werk_inhoud = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $werk_inhoud[$row['knop_id']] = ['foto' => $row['foto'], 'tekst' => $row['tekst']];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Werk</title>
    <link rel="stylesheet" href="mijnwerk.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F5F5DD;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #F4DDB1;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #D6C7B4;
        }
        .buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }
        .button {
            padding: 10px 20px;
            background-color: #D6C7B4;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
        }
        .button:hover {
            background-color: #b89c8e;
        }
        .content {
            margin-top: 20px;
        }
        .content img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Mijn Werk</h2>
        <div class="buttons">
            <button class="button" onclick="showContent(1)">Yeti Hunters</button>
            <button class="button" onclick="showContent(2)">Vacature Website</button>
            <button class="button" onclick="showContent(3)">Knop 3</button>
            <button class="button" onclick="showContent(4)">Knop 4</button>
            <button class="button" onclick="showContent(5)">Knop 5</button>
            <button class="button" onclick="showContent(6)">Knop 6</button>
        </div>
        <div class="content" id="fotoTekst">
            <!-- Hier komt de foto en tekst na het klikken op een knop -->
        </div>
    </div>
    <script>
        const werkInhoud = <?php echo json_encode($werk_inhoud); ?>;
        console.log(werkInhoud); // Debugging: log the contents to check if data is correctly fetched

        function showContent(knopId) {
            const content = werkInhoud[knopId];
            console.log(content); // Debugging: log the content to check if the correct data is fetched
            if (content) {
                document.getElementById('fotoTekst').innerHTML = `
                    <img src="data:image/jpeg;base64,${content.foto}" alt="Foto voor knop ${knopId}">
                    <p>${content.tekst}</p>
                `;
            } else {
                document.getElementById('fotoTekst').innerHTML = '<p>Geen inhoud beschikbaar voor deze knop.</p>';
            }
        }
    </script>
</body>
</html>
