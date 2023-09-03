<?php
// Inclure le fichier de connexion à la base de données
include("../bdd/connection.php");

// Effectuer une requête SQL pour récupérer les données de la table 'effectifs'
$sql = "SELECT poste, description, pseudo, image FROM effectifs";
$result = mysqli_query($connexion, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <!-- *******  Link To Custom CSS Style Sheet  ******* -->
  <link rel="stylesheet" type="text/css" href="style.css">

  <!-- *******  Font Awesome Icons Link  ******* -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

  <!-- *******  Owl Carousel Links  ******* -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>

  <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>Notre Effectifs</title>
</head>
<body>

<div class="testimonials-section">
	
	<!-- Section Header Starts -->
	<header class="section-header">
		<h1>Erah - Effectifs</h1>
	</header>
	<!-- Section Header Ends -->

	<div class="owl-carousel owl-theme testimonials-container">
        <?php
        // Parcourir les résultats de la requête SQL
        while ($row = mysqli_fetch_assoc($result)) {
            // Extraire les données de chaque ligne
            $poste = $row['poste'];
            $description = $row['description'];
            $pseudo = $row['pseudo'];
            $image = $row['image'];

            // Afficher les données dans votre structure HTML
            echo '
            <div class="item testimonial-card">
                <main class="test-card-body">
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <h2>' . $poste . '</h2>
                    </div>
                    <p><strong>' . $pseudo . '</strong> ' . $description . '</p>
                    <div class="ratings">
                        <!-- ... (vos liens vers les réseaux sociaux) ... -->
                    </div>
                </main>
                <div class="profile">
                    <div class="profile-image">
                        <img src="' . $image . '">
                    </div>
                    <div class="profile-desc">
                        <span>' . $pseudo . '</span>
                        <span>' . $poste . '</span>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>

</div>
<!-- Owl Carousel Slider Ends -->

<!--   *****   JQuery Link   *****   -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!--   *****   Owl Carousel js Link  *****  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!--   *****   Link To Custom Script File   *****   -->
<script type="text/javascript" src="script.js"></script>
</body>
</html>