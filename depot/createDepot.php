<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Création d'un nouveau dépôt </title>
    <link href="../css/styles.css" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTS5VYolg4PlHUkQ7wMn4lTENI-rS9XfFDTOg&s">
</head>
<body>

<header>
<img src="https://www.nuitdelinfo.com/inscription/uploads/ecoles/573/logos/logo.png" alt="Logo EPSI/WIS" class="logoepsi" width="85" height="80">
    <h1 class="green"> Création d'un nouveau dépôt : </h1>
    <p class="center">
        <p class="pagemenu"><a href="../Admin/indexAdmin.php"> Accueil </a></p>
    </p>
</header>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'] ?? '';
    $destinataire = $_POST['destinataire'] ?? '';
    $matiere = $_POST['matiere'] ?? '';
    $description = $_POST['description'] ?? '';
    $date = $_POST['date'] ?? '';
    $file = $_FILES['monfichier'] ?? null;

    $subDir = '../uploads/' . $matiere . '/' . $nom . '/';
    if (!is_dir($subDir)) {
        mkdir($subDir, 0777, true); 
    }    

    $uploadFile = $subDir . basename($file['name']);

    if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
        echo "Le dépôt a été créé avec succès!";
        echo '<a href="existDepot.php"> Voir les dépôts disponibles </a>';
    } else {
        echo "Échec de la création du dépôt.";
    }
}
?>

<form method="POST" action="createDepot.php" enctype="multipart/form-data">
    <label for="nom"> Titre du devoir : </label><br>
    <input type="text" id="nom" name="nom" required><br><br>
    
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
    <input type="text" id="description" name="description" required><br><br>

    <label for="date"> A rendre pour le : </label><br>
    <input type="date" id="date" name="date" required><br><br>
    
    <label for="monfichier"> Joindre un fichier : </label><br>
    <input type="file" id="monfichier" name="monfichier" accept=".zip,.pptx" required><br><br>
    
    <input type="submit" class="submitcreatedepot" value="Créer le Dépôt">
</form> <br>

<footer>
    <p>&copy; 2025. Projet Solution Web EPSI. Tous droits réservés.</p>
</footer>

</body>
</html>