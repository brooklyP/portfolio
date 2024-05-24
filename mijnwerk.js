document.addEventListener("DOMContentLoaded", function() {
    // Event listeners toevoegen aan de knoppen
    document.getElementById("knop1").addEventListener("click", function() {
        toonFotoTekst("yeti.png", "Tekst voor Knop 1");
    });

    document.getElementById("knop2").addEventListener("click", function() {
        toonFotoTekst("foto2.jpg", "Tekst voor Knop 2");
    });

    document.getElementById("knop3").addEventListener("click", function() {
        toonFotoTekst("foto3.jpg", "Tekst voor Knop 3");
    });

    document.getElementById("knop4").addEventListener("click", function() {
        toonFotoTekst("foto4.jpg", "Tekst voor Knop 4");
    });

    document.getElementById("knop5").addEventListener("click", function() {
        toonFotoTekst("foto5.jpg", "Tekst voor Knop 5");
    });

    document.getElementById("knop6").addEventListener("click", function() {
        toonFotoTekst("foto6.jpg", "Tekst voor Knop 6");
    });
});
