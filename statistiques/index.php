<?php
// Inclure le fichier de connexion à la base de données
include("../bdd/connection.php");

// Exécuter une requête SQL pour récupérer les données de la table "statistiques"
$sql = "SELECT nom_statistique, chiffre, icone FROM statistiques";
$result = mysqli_query($connexion, $sql);

// Vérifier si la requête a réussi
if (!$result) {
    die("Erreur lors de la récupération des données de la base de données : " . mysqli_error($connexion));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nos Statistiques</title>
    <!-- FontAwesome Icons -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
        rel="stylesheet"
    />

    <link
        rel="stylesheet"
        href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"
    />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="wrapper">
    <?php
    // Parcourir les résultats de la requête et afficher chaque statistique
    while ($row = mysqli_fetch_assoc($result)) {
        $nomStatistique = $row["nom_statistique"];
        $chiffreStatistique = $row["chiffre"];
        $iconeStatistique = $row["icone"];
        ?>
        <div class="container">
            <i class="fas <?php echo $iconeStatistique; ?>"></i>
            <span class="num"><?php echo $chiffreStatistique; ?></span>
            <span class="text"><?php echo $nomStatistique; ?></span>
        </div>
        <?php
    }

    // Libérer les résultats de la requête
    mysqli_free_result($result);

    // Fermer la connexion à la base de données
    mysqli_close($connexion);
    ?>
</div>
<a href="../index.php" class="bottom"> Retour a l'accueil <i class='bx bxs-home-alt-2'></i></a>
</body>
</html>
