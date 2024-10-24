<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formulardaten erfassen
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    // Überprüfen, ob die Felder nicht leer sind und ob die E-Mail-Adresse gültig ist
    if ($name && $email && $message) {
        $recipient = "FiSi.BrunoMeier@t-online.de";  // Deine E-Mail-Adresse hier
        $subject = "Neue Nachricht von $name";
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Nachricht:\n$message\n";

        $email_headers = "From: $name <$email>";

        // Senden der E-Mail
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Erfolgreiche Nachricht
            echo "Danke! Ihre Nachricht wurde erfolgreich gesendet.";
        } else {
            // Fehlgeschlagene Nachricht
            echo "Es tut uns leid, aber Ihre Nachricht konnte nicht gesendet werden.";
        }
    } else {
        echo "Bitte füllen Sie alle Felder korrekt aus.";
    }
}
?>
