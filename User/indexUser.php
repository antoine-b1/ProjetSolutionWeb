<?php
session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "utilisateur") {
    header("Location: ../account/login.php");
    exit;
}
require '../config/database.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Accueil </title>
    <link href="../css/styles.css" rel="stylesheet"/>
    <link rel="icon" type="image/png"
          href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTS5VYolg4PlHUkQ7wMn4lTENI-rS9XfFDTOg&s">
</head>
<body>

<header>
    <img src="https://www.nuitdelinfo.com/inscription/uploads/ecoles/573/logos/logo.png"
         alt="Logo EPSI/WIS" class="logoepsi" width="85" height="80">
    <h1 class="green"> Accueil </h1>
    <p class="center">
        <p class="pagemenu">Utilisateur</p>
    </p>
</header>

<p class="right"> École : EPSI/WIS ARRAS </p>

<h3> Bienvenue sur la page d'Utilisateur, </h3>
<p> Cet espace est destiné aux apprenants ! </p> <br>

<h2> Dépôts disponibles : </h2> <br>

<?php
$stmt = $conn->prepare("SELECT * FROM depots_fichiers");
$stmt->execute();
$depots = $stmt->fetchAll();

if (count($depots) === 0) {
    echo "<p>Aucun dépôt disponible pour le moment.</p>";
} else {
    foreach ($depots as $depot) {
        echo "<div style='margin-bottom: 20px;'>";
        echo "<strong>Titre :</strong> " . htmlspecialchars($depot['nom_fichier']) . "<br>";
        echo "<form method='GET' action='../depot/rendredevoir.php'>";
        echo "<input type='hidden' name='depot_id' value='" . $depot['id'] . "'>";
        echo "<button type='submit'>Rendre ce devoir</button>";
        echo "</form>";
        echo "</div>";
    }
}
?>

<footer>
    <p>&copy; 2025. Projet Solution Web EPSI. Tous droits réservés.</p>
</footer>

</body>
</html>
