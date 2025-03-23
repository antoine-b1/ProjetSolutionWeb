<?php
session_start();
require '../config/database.php';

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
    header("Location: ../account/login.php");
    exit;
}

$depot_id = $_POST['depot_id'] ?? null;

if (!$depot_id) {
    echo "Aucun dépôt sélectionné.";
    exit;
}


$stmt = $conn->prepare("
    SELECT dr.fichier, dr.date_rendu, u.nom, u.prenom
    FROM devoirs_rendus dr
    JOIN utilisateurs u ON dr.utilisateur_id = u.id
    WHERE dr.depot_id = :depot_id
    ORDER BY dr.date_rendu DESC
");
$stmt->execute([':depot_id' => $depot_id]);
$rendus = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rendus du devoir</title>
    <link rel="stylesheet" href="../css/devoirfait.css">
</head>
<body>

<header>
    <h1>Devoirs des étudiants</h1>
    <a href="../Admin/indexAdmin.php">← Retour à l'accueil</a>
</header>

<main>
    <?php if (empty($rendus)): ?>
        <p>Aucun devoir n'a été rendu pour ce dépôt.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Étudiant</th>
                    <th>Fichier</th>
                    <th>Date de rendu</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rendus as $rendu): ?>
                    <tr>
                        <td><?= htmlspecialchars($rendu['prenom'] . ' ' . $rendu['nom']) ?></td>
                        <td><?= basename($rendu['fichier']) ?></td>
                        <td><?= $rendu['date_rendu'] ?></td>
                        <td>
                            <form method="post" action="download.php" style="margin:0;">
                                <input type="hidden" name="fichier" value="<?= htmlspecialchars($rendu['fichier']) ?>">
                                <button type="submit">Télécharger</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</main>

</body>
</html>
