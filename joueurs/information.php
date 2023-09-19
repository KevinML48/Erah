<?php
// Inclure le fichier de connexion à la base de données
include("../bdd/connection.php");

// Vérifier si l'ID du joueur est passé dans l'URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // Exécuter une requête SQL pour récupérer les informations du joueur en fonction de son ID
    $sql = "SELECT pseudo, rang, description, twitter, discord, image FROM rocketleague WHERE id = $id"; // Assurez-vous que votre table contient une colonne "id"
    $result = mysqli_query($connexion, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        // Récupérer les données du joueur
        $row = mysqli_fetch_assoc($result);
        $pseudo = $row["pseudo"];
        $rang = $row["rang"];
        $description = $row["description"];
        $twitter = $row["twitter"];
        $discord = $row["discord"];
        $image = $row["image"];
        
        // Maintenant, vous avez les données du joueur dans ces variables
    } else {
        echo "Aucun joueur trouvé avec cet ID.";
    }
} else {
    echo "Aucun ID de joueur spécifié.";
}

// Fermer la connexion à la base de données
mysqli_close($connexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Joueurs</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    
    <header class="header">
        <a href="#" class="logo"><?php echo $pseudo; ?></a>

        <nav class="navbar">
            <a href="#" class="active">Affiche</a>
        </nav>
    </header>

    <section class="home">
        <div class="home-image">
            <img src="<?php echo $image; ?>">
        </div>

        <div class="home-content">
            <!-- Afficher les informations du joueur récupérées par le code PHP -->
            <h1><?php echo $pseudo; ?></h1>
            <h3><?php echo $rang; ?></h3>
            <p><?php echo $description; ?></p>

            <div class="home-sci">
                <a href="<?php echo $twitter; ?>"><i class="bx bxl-twitter"></i></a>
                <a href="<?php echo $discord; ?>"><i class="bx bxl-discord"></i></a>
            </div>

            <a href="../Panel-jeux/index.php" class="btn">Voir L'équipe</a>
        </div>
    </section>

</body>
</html>
