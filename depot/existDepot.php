<?php
session_start();
require '../config/database.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../account/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Dépôts existants</title>
    <link rel="stylesheet" href="../css/existDepot.css">
    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTS5VYolg4PlHUkQ7wMn4lTENI-rS9XfFDTOg&s">
</head>
<body>

<header>
    <img src="https://www.nuitdelinfo.com/inscription/uploads/ecoles/573/logos/logo.png"
         alt="Logo EPSI/WIS" class="logoepsi" width="85" height="80">
    <h1 class="green"> Dépôts existants : </h1>
    <p class="center">
        <p class="pagemenu"><a href="../Admin/indexAdmin.php"> Accueil </a></p>
    </p>
</header>

<?php
// Récupération des dépôts depuis la base
$stmt = $conn->prepare("SELECT * FROM depots_fichiers");
$stmt->execute();
$depots = $stmt->fetchAll();

if (count($depots) === 0) {
    echo "<p>Aucun dépôt pour l'instant.</p>";
} else {
    foreach ($depots as $depot) {
        $cheminComplet = $depot['chemin_fichier'];
        echo '<div style="margin-bottom: 20px;">';
        echo '<strong>Titre du devoir :</strong> ' . htmlspecialchars($depot['nom_fichier']) . '<br>';

        
        echo '<form method="post" action="edit.php">';
        echo '<input type="hidden" name="depot_id" value="' . $depot['id'] . '">';
        echo '<button type="submit">Modifier le fichier</button>';
        echo '</form>';

        echo '<form method="post" action="delete.php" onsubmit="return confirm(\'Supprimer définitivement ce dépôt ?\');">';
        echo '<input type="hidden" name="depot_id" value="' . $depot['id'] . '">';
        echo '<button type="submit">Supprimer le dépôt</button>';
        echo '</form>';

       
        echo '<form method="post" action="download.php">';
        echo '<input type="hidden" name="fichier" value="' . htmlspecialchars($cheminComplet) . '">';
        echo '<button type="submit">Télécharger le fichier</button>';
        echo '</form>';

        
        echo '<form method="post" action="devoirsfaits.php">';
        echo '<input type="hidden" name="depot_id" value="' . $depot['id'] . '">';
        echo '<button type="submit">Voir les devoirs des étudiants</button>';
        echo '</form>';

        echo '</div><hr>';
    }
}
?>

<footer>
    <p>&copy; 2025. Projet Solution Web EPSI. Tous droits réservés.</p>
</footer>

</body>
</html>

