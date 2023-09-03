<?php
// Inclure le fichier de connexion à la base de données
include("./bdd/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erah -Association</title>
    <link rel="stylesheet" href="css/style.css">

    <!-- Box Icons -->
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!-- Google Fonts -->

    <link rel="preconnect" href="https://font.googleapis.com">
    <link rel="preconnect" href="https://font.gstatic.com" crossorigin>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
      rel="stylesheet"
    />
</head>

<body>

    <!-- header -->
    <header>
        <a href="#" class="logo"><i class="bx bxs-home"></i>Erah - Association</a>

        <ul class="navlist">
            <li><a href="#home" class="active">Home</a></li>
            <li><a href="postuler/index.html">Postuler</a></li>
            <li><a href="galery/index.html">Galery</a></li>
            <li><a href="Effectifs/index.php">Effectif</a></li>
        </ul>

        <div class="nav-icons">
            <a href="https://twitter.com/ErahAssociation" target="_blank"><i class='bx bxl-twitter' ></i></a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>

    <!-- Home -->
    <section class="home" id="home">

        <div class="home-text">
            <h1>Nous <span>sommes la </span> <br> pour vous </h1>
            <a href="statistiques/index.php" class="btn">Nos Stastitiques<i class='bx bxs-right-arrow'></i></a>
            <a href="galery/index.html" class="btn2">Nos équipes</a>
        </div>

        <div class="home-img">
            <img src="Images/logo-erah-sans-fond.png">
        </div>

    </section>

    <!-- Container -->
    <section class="container">

        <div class="container-box">
            <i class='bx bxs-file-find'></i>
            <h3>Postuler</h3>
            <a href="postuler/index.html">Details</a>
        </div>

        <div class="container-box">
            <i class='bx bxs-info-circle'></i>
            <h3>En savoir plus</h3>
            <a href="savoir-plus/index.html">Details</a>
        </div>

        <div class="container-box">
            <i class='bx bx-sitemap'></i>
            <h3>Effectif</h3>
            <a href="Effectifs/index.php">Details</a>
        </div>

    </section>
    <!-- scroll top -->
    <a href="#" class="scroll">
        <i class='bx bx-up-arrow-alt'></i>
    </a>

    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- link to js -->
    <script src="js/script.js"></script>

</body>
</html>