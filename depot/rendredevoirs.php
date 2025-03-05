<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendre un devoirs</title>
    <link href="../css/styles.css" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTS5VYolg4PlHUkQ7wMn4lTENI-rS9XfFDTOg&s">
</head>
<body>

<header>
    <img src="https://www.nuitdelinfo.com/inscription/uploads/ecoles/573/logos/logo.png" alt="Logo EPSI/WIS" class="logoepsi" width="85" height="80">
    <h1 class="green">Rendre un devoirs</h1>
    <p class="center"><p class="pagemenu">Utilisateur</p></p>
</header>
<p class="right"> École : EPSI/WIS ARRAS </p class="right">      

<?php
$nom = '';
$matiere = '';
$description = '';
$date = '';
    echo ' <label> Titre du devoir : </label> ';
    echo $nom;
    echo '<br>';
    echo ' <label> Matière : </label> '; 
    echo $matiere;
    echo '<br>';
    echo ' <label> Description : </label> '; 
    echo $description;
    echo '<br>';
    echo ' <label> A rendre pour le : </label> '; 
    echo $date;
?>

<form>
<label for="mondevoir"> Choisir votre fichier : </label><br>
    <input type="file" id="mondevoir" name="mondevoir" accept=".zip,.pptx" required><br><br>
    <input type="submit" class="submitcreatedepot" value="Envoyer votre réponse"> </form>

<br>

<footer>
    <p>&copy; 2025. Projet Solution Web EPSI. Tous droits réservés.</p>
</footer>

</body>
</html>
