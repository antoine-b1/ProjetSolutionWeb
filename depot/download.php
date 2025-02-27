<?php
if (!empty($_POST['fichier'])) {
    $filename = basename($_POST['fichier']);
    $filepath = '../uploads/' . $_POST['fichier'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        readfile($filepath);
        exit;
    } else {
        echo "Le fichier n'existe pas.";
    }
} else {
    echo "Aucun fichier spécifié.";
}
?>
