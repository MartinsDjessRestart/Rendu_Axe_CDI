<?php
require 'template_twitter/base.php';

$insert = $database->prepare("INSERT INTO utilisateur (user, nom, email, mdp) VALUES (:idname, :user_name, :email, :user_pass)");
$insert->execute(
    [
        'idname' => $_POST['user'],
        'user_name' => $_POST['nom'],
        'email' => $_POST['email'],
        'user_pass' => $_POST['mdp']
    ]
);

header("Location: twitter.php");

