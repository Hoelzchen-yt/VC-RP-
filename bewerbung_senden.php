<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formulardaten auslesen
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $age = htmlspecialchars($_POST['age']);
    $experience = htmlspecialchars($_POST['experience']);
    $job = htmlspecialchars($_POST['job']);
    $motivation = htmlspecialchars($_POST['motivation']);
    $availability = htmlspecialchars($_POST['availability']);
    $remarks = htmlspecialchars($_POST['remarks']);

    // E-Mail-Einstellungen
    $to = "kitest2012@gmail.com";
    $subject = "Neue Bewerbung für $job";
    $message = "
        Neue Bewerbung:\n\n
        Name im Spiel: $name\n
        E-Mail Adresse: $email\n
        Alter: $age\n
        Roleplay-Erfahrung: $experience\n
        Gewünschter Job: $job\n
        Motivation: $motivation\n
        Verfügbarkeit: $availability\n
        Zusätzliche Bemerkungen: $remarks
    ";
    
    // Kopfzeilen für die E-Mail
    $headers = "From: noreply@deinedomain.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    // E-Mail senden
    if (mail($to, $subject, $message, $headers)) {
        header("Location: danke.html"); // Weiterleitung zu einer Dankeseite
        exit();
    } else {
        echo "Fehler beim Senden der Bewerbung.";
    }
}
?>
