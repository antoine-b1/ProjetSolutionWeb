<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fichier'])) {
    $chemin = "../uploads/" . $_POST['fichier'];

    if (file_exists($chemin)) {
        if (is_file($chemin)) {
            unlink($chemin); 
            echo "<p>Fichier supprimé avec succès !</p>";
        } elseif (is_dir($chemin)) {
            foreach (new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($chemin, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::CHILD_FIRST
            ) as $element) {
                if ($element->isFile()) {
                    unlink($element->getPathname()); 
                } elseif ($element->isDir()) {
                    rmdir($element->getPathname()); 
                }
            }
            rmdir($chemin);
            echo "<p> Dossier supprimé avec succès ! </p>";
        }
    } else {
        echo "<p> Le chemin spécifié n'existe pas. </p>";
    }
} else {
    echo "<p> Aucun fichier sélectionné. </p>";
}

echo '<br><a href="existDepot.php"> Retourner à la page des dépôts  </a>';
?>
