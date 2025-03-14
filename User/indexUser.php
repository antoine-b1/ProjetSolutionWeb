<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Accueil </title>
    <link href="../css/styles.css" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTS5VYolg4PlHUkQ7wMn4lTENI-rS9XfFDTOg&s">
</head>
<body>

<header>
    <img src="https://www.nuitdelinfo.com/inscription/uploads/ecoles/573/logos/logo.png" alt="Logo EPSI/WIS" class="logoepsi" width="85" height="80">
    <h1 class="green"> Accueil </h1>
    <p class="center"><p class="pagemenu"> Utilisateur </p></p>
</header>
<p class="right"> École : EPSI/WIS ARRAS </p class="right">      

<h3> Bienvenue sur la page d'Utilisateur, </h3>
        <p> Cette espace est destinée aux apprenants ! </p> <br>

<h2> Dépôts disponibles : </h2> <br>

<?php
$dossier = new DirectoryIterator("../uploads");
foreach($dossier as $fichier){
    if($fichier->isDot()) continue;
    echo 'Devoirs : ' . $fichier->getFilename() . '<br>';
    echo '<form method="post" action="../depot/rendredevoirs.php">';
    echo '<button type="submit"> Rendre le devoirs </button>';
    echo '</form>';
    echo '<br>';
}
?> <br>

<footer>
    <p>&copy; 2025. Projet Solution Web EPSI. Tous droits réservés.</p>
</footer>

</body>
</html>
