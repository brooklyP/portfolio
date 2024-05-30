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

// Query om alle werkinhoud op te halen
$sql = "SELECT knop_id, foto, tekst FROM werk_inhoud";
$result = $conn->query($sql);

$werk_inhoud = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
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
</head>
<body>
    <div class="container">
        <div class="buttons">
            <?php
            // Loop door elke werkinhoud en toon de knoppen
            foreach ($werk_inhoud as $knop_id => $content) {
                echo "<button class='button' onclick='showContent($knop_id)'>Knop $knop_id</button>";
            }
            ?>
        </div>
        <div id="fotoTekst">
            <p>Klik op een knop om de foto en tekst te zien.</p>
        </div>
    </div>
    <script>
        const werkInhoud = <?php echo json_encode($werk_inhoud); ?>;

        function showContent(knopId) {
            const content = werkInhoud[knopId];
            if (content) {
                document.getElementById('fotoTekst').innerHTML = `<img src="${content.foto}" alt="Foto voor knop ${knopId}"><p>${content.tekst}</p>`;
            } else {
                document.getElementById('fotoTekst').innerHTML = '<p>Geen inhoud beschikbaar voor deze knop.</p>';
            }
        }
    </script>
</body>
</html>
