<?php
if (!empty($_POST['fichier'])) {
    $cheminRecu = $_POST['fichier'];

    $filepath = realpath($cheminRecu);

   
    if ($filepath && strpos($filepath, realpath('../uploads')) === 0 && is_file($filepath)) {
        $filename = basename($filepath);
        
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    } else {
        echo "<p style='color:red;'>Erreur : Le fichier n'existe pas ou le chemin est invalide.</p>";
    }
} else {
    echo "Aucun fichier spécifié.";
}
?>
