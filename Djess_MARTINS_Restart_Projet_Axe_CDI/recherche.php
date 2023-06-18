<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TwitTOS</title>
    <!-- appel de la feuille de style CSS -->
    <link rel="stylesheet" href="twitter.css">
    <!-- appel de la bibliothèque de polices FontAwesome -->
    <script src="https://kit.fontawesome.com/9de02d426a.js" crossorigin="anonymous"></script>
</head>
<body>
  <!-- Inclusion de la barre de navigation provenant d'un fichier PHP externe -->
  <?php require "template_twitter/nav.php"; ?>

  <main>
    <div class="centrer-recherche">
      <hr>
      <!-- ouverture du formulaire de recherche -->
      <form action="" method="GET">
        <input type="search" name="search" placeholder="Rechercher un #">
        <!-- Bouton de soumission du formulaire, il permet de lancé la requete et d'obtenir les résultats -->
        <button type="submit">Envoyer</button>
      </form>
      <hr>
      
      <?php
        require 'template_twitter/base.php';
        
        // Préparation de la requête SQL pour la recherche de hashtags dans la base de données
        $requete = $database->prepare('SELECT * FROM home WHERE hashtag LIKE :search');
        
        if (isset($_GET['search']) && $_GET['search'] != '') {
          $searchTerm = '%' . $_GET['search'] . '%';
          $searchTweet = $requete->execute(["search" => $searchTerm]);
          $results = $requete->fetchAll(PDO::FETCH_ASSOC);
        
          if (count($results) > 0) {
            echo "<p>Voici les résultats :</p>";
            foreach ($results as $course) {
              echo "<h1>" . $course['titre'] . "</h1>";
              echo "<p>" . $course['contenu'] . "</p>";
              echo "<p>" . $course['auteur'] . "</p>";
              echo "<p>" . $course['publish_date'] . "</p>";
              echo "<hr/>";
            }
          } else {
            echo "<p>Aucun résultat trouvé</p>";
          }
        } else {
          echo "<p>Effectuez une recherche :</p>";
        }
      ?>
    </div>
  </main>

  <!-- Inclusion du fichier JavaScript -->
  <script src="twitTOS.js"></script>
</body>
</html>