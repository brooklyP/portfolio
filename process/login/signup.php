<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="signup_process.php" method="POST">
            <div class="form-group">
                <label for="gebruikersnaam">Username</label>
                <input type="text" id="gebruikersnaam" name="gebruikersnaam" required>
            </div>
            <div class="form-group">
                <label for="wachtwoord">Password</label>
                <input type="password" id="wachtwoord" name="wachtwoord" required>
            </div>
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
