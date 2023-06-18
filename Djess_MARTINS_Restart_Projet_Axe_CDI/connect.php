<?php 
require "template_twitter/base.php";

$requete = $database->prepare("SELECT * FROM utilisateur");

$requete->execute();

$allCourses = $requete->fetchAll(PDO::FETCH_ASSOC);
?>

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
<!-- appel de la barre de naviguation en php qui se trouve dans un autre fichier -->
<?php require "template_twitter/nav.php"; ?>
<main class="coAndRecherche">
  <div class="centrer">
    <!-- Ligne de séparation entre les tweets -->
    <hr>
    <!-- ouverture du formulaire d'inscription pour créer le compte de l'utilisateur -->
    <form class="form" method="POST" action="utilisateur.php">
      <!-- Champ pour l'ID utilisateur -->
      <input type="number" name="user" id="utilisateur" placeholder="id" min="0" required>
      <!-- Champ pour le pseudo -->
      <input type="text" name="nom" id="nom" placeholder="pseudo" required>
      <!-- Champ pour l'email -->
      <input type="text" name="email" id="email" placeholder="email" required>
      <!-- Champ pour le mot de passe -->
      <input type="password" name="mdp" id="mdp" placeholder="mot de passe" required>
      <!-- Bouton de soumission du formulaire, il envoie les donnés dans la base de donnés -->
      <button type="submit">Inscription</button>
    </form>
    <!-- Ligne de séparation entre les tweets -->
    <hr>
  </div>
</main>

<!-- appel du fichier JavaScript pour les différentes animations nottament pour la sidbar -->
<script src="twitTOS.js"></script>
</body>
</html>