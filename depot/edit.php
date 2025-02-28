<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_fichier = $_POST['nom_fichier'];
    $nom = $_POST['nom'];
    $destinataire = $_POST['destinataire'];
    $matiere = $_POST['matiere'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    $fichier_a_modifier = "../uploads/" . $nom_fichier;

    if (file_exists($fichier_a_modifier)) {
        echo "Les informations du fichier ont été modifiées.";
    } else {
        echo "Le fichier n'existe pas.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Modifier fichier </title>
    <link href="../css/styles.css" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTS5VYolg4PlHUkQ7wMn4lTENI-rS9XfFDTOg&s">
</head>
<body>
<header> 
    <img src="https://www.nuitdelinfo.com/inscription/uploads/ecoles/573/logos/logo.png" alt="Logo EPSI/WIS" class="logoepsi" width="85" height="80">
    <h1 class="green"> Modification du dépôts </h1>
    <p class="center"> <p class="pagemenu"> Administrateur </a> </p class="center">  </p class="pagemenu">      
</header>

<h1> Modifier le fichier : </h1>
    <form method="post">
        <input type="hidden" name="nom_fichier" value="nom_du_fichier_a_modifier">
        <label for="nom"> Nom du fichier : </label><br>
        <input type="text" id="nom" name="nom" value=""><br><br>
        
        <label for="destinataire"> Destinataire : </label><br>
        <select id="destinataire" name="destinataire" required>
            <option value="Choisir le destinataire" disabled selected> Choisir le destinataire </option>
            <option value="sn1"> SN1 - Arras </option>
            <option value="sn2"> SN2 - Arras </option>
        </select> <br><br>
        
        <label for="matiere"> Matière : </label><br>
        <select id="matiere" name="matiere" required>
            <option value="Choisir la matière" disabled selected> Choisir la matière </option>
            <option value="Algo et PHP"> Algo et PHP </option>
            <option value="Anglais"> Anglais </option>
            <option value="ATL Git"> ATL Git </option>
            <option value="ATL Google Outils"> ATL Google Outils </option>
            <option value="SISR"> SISR </option>
            <option value="SLAM"> SLAM </option>
            <option value="HEP"> HEP </option>
            <option value="Mathématiques"> Mathématiques </option>
            <option value="CEJM"> CEJM </option>
            <option value="Projet Transversal"> Projet transversal </option>
            <option value="PHP et MySQL"> PHP et MySQL </option>
            <option value="Python"> Python </option>
        </select> <br><br>
        
        <label for="description"> Description : </label><br>
        <input type="text" id="description" name="description" value=""><br><br>

        <label for="date"> A rendre pour le : </label><br>
        <input type="date" id="date" name="date" value=""><br><br>
        
        <input type="submit" value=" Enregistrer les modifications ">
    </form>

<footer>
    <p>&copy; 2025. Projet Solution Web EPSI. Tous droits réservés.</p>
</footer>

</body>
</html>