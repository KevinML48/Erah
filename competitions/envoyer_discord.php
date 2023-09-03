<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_equipe = $_POST["nom_equipe"];
    $niveau_equipe = $_POST["niveau_equipe"];
    $adresse_email = $_POST["adresse_email"];
    $discord = $_POST["discord"];
    $message = $_POST["message"]; // Récupérer la valeur du champ "message"

    // Créer une chaîne de texte formatée avec les données du formulaire
    $formDataText = "Nom de l'équipe: $nom_equipe\n";
    $formDataText .= "Niveau de l'équipe: $niveau_equipe\n";
    $formDataText .= "Adresse e-mail: $adresse_email\n";
    $formDataText .= "Discord: $discord\n\n";
    $formDataText .= "Message:\n$message"; // Inclure le message

    // URL de votre webhook Discord
    $webhook_url = "https://discord.com/api/webhooks/1147215051124641892/KIz4dvgl6wXWMwbmGhZn5UyWBWpkgc7HC8RhikrCJpi_uSeF4SaUa6TlZriqr4uiEe5H";

    // Créer le message Discord
    $data = array(
        "content" => "Nouveau formulaire de demande de showmatch:",
        "embeds" => array(
            array(
                "title" => "Formulaire de demande",
                "description" => "Un nouveau formulaire de demande a été soumis.",
                "fields" => array(
                    array(
                        "name" => "Informations du formulaire",
                        "value" => $formDataText
                    )
                ),
                "color" => 16777215 // Couleur blanche
            )
        )
    );

    // Options pour la requête HTTP
    $options = array(
        "http" => array(
            "header"  => "Content-Type: application/json",
            "method"  => "POST",
            "content" => json_encode($data)
        )
    );

    // Créer le contexte HTTP
    $context  = stream_context_create($options);

    // Envoyer la requête à Discord
    $result = file_get_contents($webhook_url, false, $context);

    if ($result === FALSE) {
        // Gestion des erreurs si la requête échoue
        echo "Erreur lors de l'envoi du message à Discord.";
    } else {
        // Rediriger vers la page de confirmation
        header("Location: confirmation.html");
        exit; // Assurez-vous de terminer le script après la redirection
    }
}
?>
