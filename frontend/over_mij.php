<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Over Mij - Brooklyn</title>
    <link rel="stylesheet" href="over_mij.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Over Mij</h1>
        </header>
        <section class="about">
            <h2>Welkom!</h2>
            <p>Ik ben Brooklyn, 17 jaar oud, en zit op Vista College Maastricht cohort 2023. Ik houd van coderen, gamen en sporten. Ik ben een gemotiveerd en mega sociaal persoon. Ik verdiep me graag in code. Ik ben een simpel persoon en volg graag instructies. Ik zit op de opleiding Software Development. Werk in een café (t'Pothuiske). Met mijn werkgroepje heb ik een video moeten maken voor het AZC en hebben we de prijs gewonnen van nummer 1 beste video op onze opleiding.</p>
        </section>
        <section class="contact">
            <h2>Contact Opnemen</h2>
            <form action="contact_process.php" method="POST">
                <div class="form-group">
                    <label for="naam">Naam</label>
                    <input type="text" id="naam" name="naam" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="bericht">Bericht</label>
                    <textarea id="bericht" name="bericht" required></textarea>
                </div>
                <button type="submit">Versturen</button>
            </form>
        </section>
    </div>
</body>
</html>
