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
            <p>
                Ik ben Brooklyn, 17 jaar oud, en zit op Vista College Maastricht, cohort 2023. Ik houd van coderen, gamen en sporten. Ik ben een gemotiveerd en mega sociaal persoon. Ik verdiep me graag in code. Ik ben een simpel persoon en volg graag instructies. Ik zit op de opleiding software development. Werk in een café (T'Pothuiske). Heb met mijn werk groepje een video moeten maken voor het AZC en hebben de prijs gewonnen van nummer 1 beste video op onze opleiding.
            </p>

            <h2>Opleiding</h2>
            <p>Opleiding: Software Development</p>
            <p>Instelling: Vista College Maastricht</p>
            <p>Cohort: 2023</p>
            <p>
                Tijdens mijn opleiding aan het Vista College heb ik uitgebreide kennis en vaardigheden verworven in verschillende programmeertalen en softwareontwikkelingstechnieken. De praktijkgerichte aanpak van de opleiding heeft mij geholpen om mijn technische competenties te ontwikkelen en toe te passen in real-world projecten.
            </p>

            <h2>Werkervaring</h2>
            <p>Werkgever: T'Pothuiske Café</p>
            <p>Functie: Medewerker</p>
            <p>Periode: Huidig</p>
            <p>
                In mijn rol als medewerker bij T'Pothuiske Café heb ik waardevolle ervaring opgedaan in klantgerichte dienstverlening en teamwerk. Deze positie heeft mijn sociale vaardigheden verder aangescherpt en mijn vermogen versterkt om effectief te communiceren en samen te werken in een dynamische omgeving.
            </p>

            <h2>Projecten</h2>
            <p>Project: Video voor het AZC</p>
            <p>Rol: Lid van het projectteam</p>
            <p>Resultaat: Winnaar van de prijs voor beste video</p>
            <p>
                Samen met mijn projectgroep heb ik een video gemaakt voor het Asielzoekerscentrum (AZC), waarbij we de eerste prijs hebben gewonnen voor de beste video binnen onze opleiding. Dit project vereiste een combinatie van creativiteit, technische vaardigheden en teamcoördinatie. Het succes van de video getuigt van onze gezamenlijke inspanningen en mijn vermogen om bij te dragen aan een winnend team.
            </p>

            <h2>Vaardigheden</h2>
            <p>Technische Vaardigheden:</p>
            <p>Programmeertalen: PHP, CSS, starter in JavaScript</p>
            <p>Softwareontwikkeling: Webontwikkeling, mobiele applicaties</p>
            <p>Tools: Git, Visual Studio Code</p>
            <p>Soft Skills:</p>
            <p>Communicatie: Uitstekende verbale en schriftelijke vaardigheden</p>
            <p>Teamwerk: Ervaren in samenwerken binnen diverse teams</p>
            <p>Probleemoplossing: Sterk analytisch vermogen en creatief in het vinden van oplossingen</p>
            <p>Aanbevelingen en getuigschriften van docenten en werkgevers zullen op aanvraag beschikbaar zijn. Deze documenten onderstrepen mijn toewijding, werkethiek en de kwaliteit van mijn bijdragen in zowel academische als professionele omgevingen.</p>

            <h2>Contactgegevens</h2>
            <p>E-mail: akuechebrooklyn@gmail.com</p>
            <p>Telefoonnummer: +31 6 82860349</p>
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
