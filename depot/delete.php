<?php
session_start();
require '../config/database.php';

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
    header("Location: ../account/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['depot_id'])) {
    $depot_id = intval($_POST['depot_id']);

    $stmt = $conn->prepare("SELECT * FROM depots_fichiers WHERE id = :id");
    $stmt->execute([':id' => $depot_id]);
    $depot = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$depot) {
        echo "<p>Ce dépôt n'existe pas en base.</p>";
        exit;
    }

    $chemin = $depot['chemin_fichier'];

   
    if (file_exists($chemin)) {
        if (is_file($chemin)) {
            unlink($chemin);
        } elseif (is_dir($chemin)) {
            foreach (new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($chemin, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::CHILD_FIRST
            ) as $element) {
                $element->isFile() ? unlink($element->getPathname()) : rmdir($element->getPathname());
            }
            rmdir($chemin);
        }
    }

    
    $delete = $conn->prepare("DELETE FROM depots_fichiers WHERE id = :id");
    $delete->execute([':id' => $depot_id]);

    echo "<p>Dépôt supprimé avec succès (fichier + base de données).</p>";
} else {
    echo "<p>Aucun dépôt spécifié.</p>";
}

echo '<br><a href="existDepot.php">Retourner à la page des dépôts</a>';
?>
