<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../account/login.php");
    exit;
}

if ($_SESSION["role"] !== "admin") {
   
    header("Location: ../User/indexUser.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Accueil </title>
    <link href="../css/indexAdmin.css" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="../image/logoEpsi/images.png">
</head>
<body>

<header> 
    <img src="../image/logoEpsiWis/logoEpsi.png" alt="Logo EPSI/WIS" class="logoepsi" width="85" height="80">
    <h1 class="green"> Accueil </h1>
    <p class="center"> <p class="pagemenu"> Administrateur </a> </p class="center">  </p class="pagemenu">      
   
</header>

<p class="right"> École : EPSI/WIS ARRAS </p>
  

    <h3> Bienvenue sur la page d'Administrateur, </h3>
        <p> Cette espace est destinée aux intervenants et au service d'administration de l'école ! </p> <br>

<h2> Créer un dépôt : </h2>
<a href="../depot/createDepot.php"> Cliquez ici pour créer un nouveau dépôt </a> <br> <br>

<h2> Dépôt déja existant : </h2>
<a href="../depot/existDepot.php"> Cliquez ici pour voir tous les dépôts </a> <br> <br>

<footer>
    <p>&copy; 2025. Projet Solution Web EPSI. Tous droits réservés.</p>
</footer>

</body>
</html>
