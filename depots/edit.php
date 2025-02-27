<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier fichier</title>
    <link href="../css/styles.css" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTS5VYolg4PlHUkQ7wMn4lTENI-rS9XfFDTOg&s">
</head>
<body>
<header> 
    <img src="https://www.nuitdelinfo.com/inscription/uploads/ecoles/573/logos/logo.png" alt="Logo EPSI/WIS" class="logoepsi" width="85" height="80">
    <h1 class="green">Modification du dépôts</h1>
    <p class="center"> <p class="pagemenu"> Administrateur </a> </p class="center">  </p class="pagemenu">      
</header>

<h1>Modifier le fichier : </h1>
    <form method="post">
        <input type="hidden" name="nom_fichier" value="">
        <label for="nom">Nom du fichier :</label><br>
        <input type="text" id="nom" name="nom" value="" required><br><br>
        
        <label for="destinataire">Destinataire :</label><br>
        <input type="text" id="destinataire" name="destinataire" value="" required><br><br>
        
        <label for="matiere">Matière :</label><br>
        <input type="text" id="matiere" name="matiere" value="" required><br><br>
        
        <label for="description">Description :</label><br>
        <input type="text" id="description" name="description" value="" required><br><br>

        <label for="date">A rendre pour le :</label><br>
        <input type="date" id="date" name="date" value="" required><br><br>
        
        <input type="submit" value="Enregistrer les modifications">
    </form>

<footer>
    <p>&copy; 2025. Projet Solution Web EPSI. Tous droits réservés.</p>
</footer>

</body>
</html>

