<?php
// Informations de connexion à la base de données
$serveur = "localhost";  // Adresse du serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$motDePasse = ""; // Mot de passe MySQL
$baseDeDonnees = "erah"; // Nom de la base de données

// Créez une connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérifiez la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// La connexion à la base de données a réussi

// Vous pouvez maintenant utiliser la variable $connexion pour exécuter des requêtes SQL
?>