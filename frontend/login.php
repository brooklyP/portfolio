<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login_process.php" method="POST">
            <div class="form-group">
                <label for="gebruikersnaam">Username</label>
                <input type="text" id="gebruikersnaam" name="gebruikersnaam" required>
            </div>
            <div class="form-group">
                <label for="wachtwoord">Password</label>
                <input type="password" id="wachtwoord" name="wachtwoord" required>
            </div>
            <div class="form-group button-group">
                <button type="submit">Login</button>
                <a href="signup.php" class="signup-button">Sign Up</a>
            </div>
        </form>
    </div>
</body>
</html>
