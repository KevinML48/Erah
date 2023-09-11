<?php
// Inclure le fichier de connexion à la base de données
include("../bdd/connection.php");

// Exécuter une requête SQL pour récupérer les données de la table "performances"
$sql = "SELECT * FROM performances";
$resultPerformances = mysqli_query($connexion, $sql);

// Vérifier si la requête a réussi
if (!$resultPerformances) {
    die("Erreur lors de la récupération des données de la base de données : " . mysqli_error($connexion));
}

// Exécuter une requête SQL pour récupérer les données des joueurs Rocket League
$sql = "SELECT id, pseudo, rang, image FROM rocketleague";
$resultRocketLeague = mysqli_query($connexion, $sql);

// Vérifier si la requête a réussi
if (!$resultRocketLeague) {
    die("Erreur lors de la récupération des données de la base de données : " . mysqli_error($connexion));
}

// Exécuter une requête SQL pour récupérer les données de la table "effectifrl"
$sql = "SELECT poste, pseudo, image FROM effectifrl";
$resultEffectifRL = mysqli_query($connexion, $sql);

// Vérifier si la requête a réussi
if (!$resultEffectifRL) {
    die("Erreur lors de la récupération des données de la base de données : " . mysqli_error($connexion));
}

// Exécuter une requête SQL pour récupérer les données de la table "actualités"
$sql = "SELECT sujet, informations, icone FROM actualités";
$resultActualites = mysqli_query($connexion, $sql);

// Vérifier si la requête a réussi
if (!$resultActualites) {
    die("Erreur lors de la récupération des données de la base de données : " . mysqli_error($connexion));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../Images/logo-erah-sans-fond.png" type="image/x-icon">
    <title>Rocket-League</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <a href="../index.php">
                    <div class="logo">
                        <img src="Images/logo-erah-sans-fond.png">
                        <h2>E<span class="danger">rah</span></h2>
                    </div>
                </a>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="#" class="active">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Nos joueurs</h3>
                </a>
                <a href="../competitions/contact.html">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Compétition</h3>
                </a>
                <a href="../postuler/index.html">
                    <span class="material-icons-sharp">
                        add
                    </span>
                    <h3>Postuler !</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
        <h1>Nos Joueurs</h1>
    <!-- Analyses -->
    <div class="analyse">
        <!-- Code pour afficher les données de la table "effectifrl" -->
        <?php
        while ($row = mysqli_fetch_assoc($resultEffectifRL)) {
            $poste = $row["poste"];
            $pseudo = $row["pseudo"];
            $image = $row["image"];
            ?>
            <div class="<?php echo strtolower($poste); ?> sales">
                <div class="status">
                    <div class="info">
                        <h3><?php echo $poste; ?></h3>
                        <h1><?php echo $pseudo; ?></h1>
                    </div>
                    <div class="progresss">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="percentage">
                            <img src="<?php echo $image; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <!-- Fin du code pour afficher les données de la table "effectifrl" -->
    </div>

            <!-- End of Analyses -->

            <!-- New Users Section -->
<div class="new-users">
    <h2>Leur Profils</h2>
    <div class="user-list">
        <?php
        // Parcourir les résultats de la requête Rocket League et afficher chaque joueur
        while ($row = mysqli_fetch_assoc($resultRocketLeague)) {
            $id = $row["id"]; // Récupérer l'ID du joueur
            $pseudo = $row["pseudo"];
            $rang = $row["rang"];
            $image = $row["image"];
            ?>
            <div class="user">
                <a href="../Joueurs/information.php?id=<?php echo $id; ?>"> <!-- Lien avec l'ID du joueur -->
                    <img src="<?php echo $image; ?>">
                    <h2><?php echo $pseudo; ?></h2>
                    <p><?php echo $rang; ?></p>
                </a>
            </div>
            <?php
        }
    
        // Libérer les résultats de la requête Rocket League
        mysqli_free_result($resultRocketLeague);
    
        // Fermer la connexion à la base de données
        mysqli_close($connexion);
        ?>
        <div class="user">
            <a href="../postuler/index.html">
                <img src="https://cdn.discordapp.com/attachments/727136125071917067/1147189711446737017/tutorial-preview-large-removebg-preview.png">
                <h2>Postuler</h2>
                <p>N'hésitez plus !</p>
            </a>
        </div>
    </div>
</div>
Avec cette modification, lorsque vous cliquez sur la balise <a> pour un joueur, vous serez redirigé vers information.php avec l'ID du joueur dans l'URL, comme vous l'avez mentionné précédemment. Assurez-vous que le chemin du fichier information.php est correct par rapport à la localisation actuelle de la page.







            <!-- End of New Users Section -->

            <!-- Recent Orders Table -->
            <div class="recent-orders">
    <h2>Nos Récentes Performances</h2>
    <table>
        <thead>
            <tr>
                <th>Equipe</th>
                <th>Rank</th>
                <th>Date</th>
                <th>Win/Loose</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Parcourir les résultats de la requête performances et afficher chaque performance dans le tableau
            while ($row = mysqli_fetch_assoc($resultPerformances)) {
                $equipe = $row["equipe"];
                $rank = $row["rank"];
                $jour = $row["jour"];
                $resultat = $row["resultat"];
                ?>
                <tr>
                    <td><?php echo $equipe; ?></td>
                    <td><?php echo $rank; ?></td>
                    <td><?php echo $jour; ?></td>
                    <td><?php echo $resultat; ?></td>
                    <td><a href="#">Détails</a></td>
                </tr>
                <?php
            }

            // Libérer les résultats de la requête performances
            mysqli_free_result($resultPerformances);
            ?>
        </tbody>
    </table>
</div>
            <!-- End of Recent Orders -->

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Bienvenue</b></p>
                        <small class="text-muted">Informations</small>
                    </div>
                    <div class="profile-photo">
                        <img src="https://cdn.discordapp.com/attachments/727136125071917067/1147175662159933450/rocket-league.png">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="Images/logo-erah-sans-fond.png">
                    <h2>Rocket-League</h2>
                    <p>Découvrer nos équipes</p>
                </div>
            </div>

            <div class="reminders">
    <div class="header">
        <h2>Actualités</h2>
        <span class="material-icons-sharp">
            notifications_none
        </span>
    </div>

    <?php
    // Parcourir les résultats de la requête actualités et afficher chaque actualité dans une notification
    while ($row = mysqli_fetch_assoc($resultActualites)) {
        $icone = $row["icone"];
        $sujet = $row["sujet"];
        $informations = $row["informations"];
        ?>

        <div class="notification">
            <div class="icon">
                <span class="material-icons-sharp">
                    <?php echo $icone; ?>
                </span>
            </div>
            <div class="content">
                <div class="info">
                    <h3><?php echo $sujet; ?></h3>
                    <small class="text_muted">
                        <?php echo $informations; ?>
                    </small>
                </div>
            </div>
        </div>

    <?php
    }
    ?>

    <div class="notification add-reminder">
        <div>
            <span class="material-icons-sharp">
                notifications_none
            </span>
            <h3>De nouvelles actualités vont arriver !</h3>
        </div>
    </div>
</div>

        </div>


    </div>

    <script src="index.js"></script>
</body>

</html>