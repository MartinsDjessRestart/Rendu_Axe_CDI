<?php
require "template_twitter/base.php";

$order = $database->prepare('SELECT * FROM home ORDER BY publish_date DESC');
$order->execute();
$allCourses = $order->fetchAll(PDO::FETCH_ASSOC);
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
    <!-- appelation de la barre de naviguation en php qui se trouve dans un autre fichier -->
<?php require "template_twitter/nav.php"; ?>
    <!-- J'ouvre une div principale -->
    <div>
        <!-- J'ouvre un main qui contient toute ma partie pour le tweet -->
        <main>
             <!-- Bouton pour ajouter un tweet -->
             <button id="bouton-ajout">Ajouter un tweet <i class="fa-solid fa-circle-plus"></i></button>

                <!-- j'ouvre une div pour pouvoir faire ma fenetre pour l'ajout d'un tweet -->
                <div id="fenetre" class="fenetre">
                    <!-- j'ouvre une 2e div pour pouvoir mettre toute la partie insertion de contenu -->
                    <div class="contenu-fenetre">
                        <!-- Bouton pour fermer la fenêtre d'insertion -->
                        <button id="bouton-fermer" class="fermer">&times;</button>
                        <!-- j'appelle un formulaire obligatoire pour ajouter un tweet contenant différent input -->
                        <form class="formulaire" method="POST" action="inserer.php">
                            <input type="text" name="titre" placeholder="titre du message" required>
                            <input type="text" name="contenu" placeholder="Écris ton message" required>
                            <select name="hashtag" required>
                                <option value="">Choisissez un tag</option>
                                <!-- l'utilisteur peut notament selectionner ses tags grace à l'appel de la balise option -->
                                <option id="tag1" value="#TwitTos">#TwitTos</option>
                                <option id="tag2" value="#IIM">#IIM</option>
                                <option id="tag3" value="#Code">#Code</option>
                                <option id="tag4" value="#3D">#3D</option>
                                <option id="tag5" value="#CDEB">#CDEB</option>
                                <option id="tag6" value="#CD">#CD</option>
                                <option id="tag7" value="#GA">#GA</option>
                                <option id="tag8" value="#GD">#GD</option>
                                <option id="tag9" value="#GP">#GP</option>
                                <option id="tag10" value="#Random">#Random</option>
                            </select>
                            <!-- Bouton d'action pour envoyer le contenue dans la base de donné du tweet pré-établie dans la fentre -->
                            <button id="bouton-envoi" type="submit">Envoyer</button>
                        </form>
                    </div>
                </div>
            
            <!-- Boucle pour afficher les tweets -->
            <?php foreach($allCourses as $course) { ?>
                <!-- ouverture d'un div pour la partie profil de l'utilisateur -->
                <div class="twitosprofil">
                    <img class="image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkbZrqHLrkNGeIWaCQyTGh9OzunLDlnheumk1XEiA-wFgeMPv8oFbow7XZkM8LVJcsQis&usqp=CAU" alt="Photo de profil">
                    <h1>@<?= $course['auteur']; ?></h1>
                </div>
                <!-- ouverture d'un div pour afficher la partie contenue du tweet depuis la base de donné vers le site donc du php vers l'html -->
                <div class="contenue">
                <!-- permet d'afficher le titre du tweet -->
                <p class="taille"><?= $course['titre']; ?></p>
                <!-- permet d'afficher le contenu du tweet -->
                <p><?= $course['contenu']; ?></p>
                <!--permet d'afficher le hashtag du tweet -->
                <p id="tag"><?= $course['hashtag']; ?></p>
                <!-- permet d'afficher la date de publication du tweet -->
                <p><?= $course['publish_date']; ?></p>
                <!-- Ligne de séparation entre les tweets -->
                <hr>
                 <!-- ouverture d'une div pour afficher les différentes interaction possible avec le tweet comme par exemple un sytème de like -->
                    <div class="action">
                        <i id="heartIcon" class="fa-solid fa-heart"></i>
                        <i class="fa-solid fa-message"></i>
                        <i class="fa-solid fa-shuffle"></i>
                    </div>
                </div>

                <!-- ouverture d'un formulaire pour afficher le bouton de suppression du contenue du tweet -->  
                <form action="supp.php" method="POST" id="formulaire-supprimer">
                    <input type="hidden" name="supp" value="<?= $course['id']; ?>">
                    <!-- Bouton de suppression, il permet de supprimer le contenue directement dans la base de donnés et donc sur l'html-->
                    <button id="bouton-supprimer" type="button"><i class="fa-regular fa-trash-can"></i></button>
                </form>

                <!-- ouverture d'une div pour afficher la fenêtre de confirmation de suppression -->
                <div id="fenetre-suppr" class="fenetre-suppr">
                    <div class="modal-content-suppr">
                        <!-- Bouton de fermeture de la fenêtre de suppression, cela annule la procédure -->
                        <button id="bouton-ferme" class="fermer">&times;</button>
                        <p>Vous allez supprimer ce contenu</p>
                        <!-- Bouton de confirmation de suppression, cela supprime définitevent le tweet -->
                        <button id="bouton-confirmer">Confirmer</button>
                    </div>
                </div>
                <!-- Ligne de séparation entre les tweets -->
                <hr>
            <?php } ?>
        </main>
        <!-- appel du fichier JavaScript pour les différentes animations qui gere nottament l'affichage de la page de suppression et d'ajout des tweets -->
        <script src="twitTOS.js"></script>
    </div>
</body>
</html
