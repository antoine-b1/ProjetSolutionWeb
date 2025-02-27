<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'un nouveau dépôt</title>
    <link href="../css/styles.css" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTS5VYolg4PlHUkQ7wMn4lTENI-rS9XfFDTOg&s">
</head>
<body>

<header>
<img src="https://www.nuitdelinfo.com/inscription/uploads/ecoles/573/logos/logo.png" alt="Logo EPSI/WIS" class="logoepsi" width="85" height="80">
    <h1 class="green">Création d'un nouveau dépôt : </h1>
    <p class="center">
        <p class="pagemenu"><a href="../Admin/indexAdmin.php"> Accueil </a></p>
    </p>
</header>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $matiere = $_POST['matiere'];
    $file = $_FILES['monfichier'];

    $subDir = '../uploads/' . $nom . '-' . $matiere . '/';
    
    if (!is_dir($subDir)) mkdir($subDir, 0777, true);

    $uploadFile = $subDir . basename($file['name']);

    if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
        echo "Le dépôt a été créé avec succès!";
    } else {
        echo "Échec de la création du dépôt.";
    }
}
?>

<form method="POST" action="createDepot.php" enctype="multipart/form-data">
    <label for="nom">Nom du fichier :</label><br>
    <input type="text" id="nom" name="nom" required><br><br>
    
    <label for="destinataire">Destinataire :</label><br>
    <input type="text" id="destinataire" name="destinataire" required><br><br>
    
    <label for="matiere">Matière :</label><br>
    <input type="text" id="matiere" name="matiere" required><br><br>
    
    <label for="description">Description :</label><br>
    <input type="text" id="description" name="description" required><br><br>

    <label for="date">A rendre pour le :</label><br>
    <input type="date" id="date" name="date" required><br><br>
    
    <label for="monfichier">Joindre un fichier :</label><br>
    <input type="file" id="monfichier" name="monfichier" accept=".zip,.pptx" required><br><br>
    
    <input type="submit" value="Créer le Dépôt">
</form>

<footer>
    <p>&copy; 2025. Projet Solution Web EPSI. Tous droits réservés.</p>
</footer>

</body>
</html>
