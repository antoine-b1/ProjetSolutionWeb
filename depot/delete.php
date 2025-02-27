<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fichier'])) {
    $fichierASupprimer = "../uploads/" . $_POST['fichier'];
    if (file_exists($fichierASupprimer)) {
        unlink($fichierASupprimer);
        echo "<p>Le fichier " . htmlspecialchars($_POST['fichier']) . " a été supprimé avec succès !</p>";
        echo '<br><a href="existDepot.php"> Retourner à la page des dépôts existants </a>';
    } else {
        echo "<p>Le fichier n'existe pas.</p>";
    }
} else {
    echo "<p>Aucun fichier sélectionné.</p>";
}
?>
