<?php
require 'template_twitter/base.php';

$nom = $database->prepare("SELECT nom FROM utilisateur");
$nom->execute();
$resultat = $nom->fetch(PDO::FETCH_ASSOC);
$envoie_auteur = $resultat['nom'];

$requete = $database->prepare("INSERT INTO home (titre, contenu, hashtag, auteur) VALUES (:envoie_titre, :envoie_contenu, :envoie_h, :envoie_auteur)");
$requete->execute(
    [
        'envoie_titre' => $_POST['titre'],
        'envoie_contenu' => $_POST['contenu'],
        'envoie_h' => $_POST['hashtag'],
        'envoie_auteur' => $envoie_auteur,
    ]
);

header("Location: twitter.php");