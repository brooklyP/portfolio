<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Zorg ervoor dat je PHPMailer correct hebt gedownload en geconfigureerd
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/SMTP.php';

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
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $bericht = $_POST['bericht'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO contacten (user_id, naam, email, bericht) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $user_id, $naam, $email, $bericht);

    if ($stmt->execute()) {
        echo "Bericht succesvol opgeslagen in de database.";

        // PHPMailer configuratie
        $mail = new PHPMailer(true);
        try {
            // Server instellingen
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com'; // Zet je SMTP-server hier
            $mail->SMTPAuth = true;
            $mail->Username = 'phpmailer251106@gmail.com'; // Zet je SMTP-gebruikersnaam hier
            $mail->Password = '1234poepkaka1234'; // Zet je SMTP-wachtwoord hier
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Ontvangers instellingen
            $mail->setFrom('jouw-email@example.com', 'Jouw Naam');
            $mail->addAddress($email, $naam);

            // Inhoud van de mail
            $mail->isHTML(true);
            $mail->Subject = 'Bevestiging van je bericht';
            $mail->Body    = 'Beste ' . $naam . ',<br><br>Bedankt voor je bericht. We nemen zo snel mogelijk contact met je op.<br><br>Met vriendelijke groet,<br>Jouw Naam';

            $mail->send();
            echo 'Bevestigingsmail is verstuurd.';
        } catch (Exception $e) {
            echo "Bevestigingsmail kon niet verstuurd worden. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Er is een fout opgetreden bij het opslaan van het bericht.";
    }

    $stmt->close();
}

$conn->close();
?>
