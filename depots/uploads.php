<?php
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["monfichier"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if($fileType != "zip" && $fileType != "pptx" ) {
    echo "Désolé, seuls les fichiers ZIP et PPTX sont autorisés.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Désolé, votre fichier n'a pas été uploadé.";
} else {
    if (move_uploaded_file($_FILES["monfichier"]["tmp_name"], $target_file)) {
        echo "Le fichier ". htmlspecialchars(basename($_FILES["monfichier"]["name"])). " a été uploadé.";
        echo '<br><a href="../Admin/indexAdmin.php"> Retourner à la page principal </a>';
    } else {
        echo "Désolé, une erreur est survenue lors de l'upload de votre fichier.";
    }
}
?>

