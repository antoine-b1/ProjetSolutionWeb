<?php
session_start();
require '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../account/login.php");
    exit;
}

$utilisateur_id = $_SESSION['user_id'];
$depot_id = $_GET['depot_id'] ?? null;


$nom = $matiere = $description = $date = "";

if ($depot_id) {
    $stmt = $conn->prepare("SELECT * FROM depots_fichiers WHERE id = :id");
    $stmt->execute([':id' => $depot_id]);
    $depot = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($depot) {
        $nom = $depot['nom_fichier'];
        $description = $depot['description'] ?? '';
        $date = $depot['date_limite'] ?? '';
        $matiere = ""; 
    } else {
        echo "<p>Dépot introuvable.</p>";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES['mondevoir'])) {
    $file = $_FILES['mondevoir'];
    $filename = basename($file['name']);
    $uploadDir = '../uploads/rendus/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $target = $uploadDir . $filename;

    if (move_uploaded_file($file['tmp_name'], $target)) {
        $stmt = $conn->prepare("INSERT INTO devoirs_rendus (utilisateur_id, depot_id, fichier) VALUES (:uid, :depot_id, :fichier)");
        $stmt->execute([
            ':uid' => $utilisateur_id,
            ':depot_id' => $depot_id,
            ':fichier' => $target
        ]);
        echo "<p style='color:green;'>Fichier envoyé avec succès !</p>";
    } else {
        echo "<p style='color:red;'>Erreur lors de l'envoi du fichier.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Rendre un devoir</title>
    <link href="../css/styles.css" rel="stylesheet"/>
</head>
<body>

<header>
    <img src="https://www.nuitdelinfo.com/inscription/uploads/ecoles/573/logos/logo.png" alt="Logo EPSI/WIS" class="logoepsi" width="85" height="80">
    <h1 class="green"> Rendre un devoir </h1>
</header>

<p><strong>Titre :</strong> <?= htmlspecialchars($nom) ?></p>
<p><strong>Matière :</strong> <?= htmlspecialchars($matiere) ?></p>
<p><strong>Description :</strong> <?= htmlspecialchars($description) ?></p>
<p><strong>Date limite :</strong> <?= htmlspecialchars($date) ?></p>

<form method="POST" enctype="multipart/form-data">
    <label for="mondevoir">Choisir votre fichier :</label><br>
    <input type="file" name="mondevoir" accept=".zip,.pptx" required><br><br>
    <input type="submit" value="Envoyer votre réponse">
</form>

<br>
<a href="../User/indexUser.php">Retour à l'accueil</a>

<footer>
    <p>&copy; 2025. Projet Solution Web EPSI. Tous droits réservés.</p>
</footer>

</body>
</html>
