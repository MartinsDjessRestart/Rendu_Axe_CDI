<?php
require'template_twitter/base.php';

$supp = $database->prepare("DELETE FROM home WHERE id = :id");
$supp->execute(
    [
        "id" => $_POST['supp']
    ]
);

header("Location: twitter.php");