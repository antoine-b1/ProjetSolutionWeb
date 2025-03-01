<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dépôts existants</title>
    <link href="../css/styles.css" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTS5VYolg4PlHUkQ7wMn4lTENI-rS9XfFDTOg&s">
</head>
<body>

<header>
    <img src="https://www.nuitdelinfo.com/inscription/uploads/ecoles/573/logos/logo.png" alt="Logo EPSI/WIS" class="logoepsi" width="85" height="80">
    <h1 class="green">Dépots existants :</h1>
    <p class="center">
        <p class="pagemenu"><a href="../Admin/indexAdmin.php"> Accueil </a></p>
    </p>
</header>

<?php
$dossier = new DirectoryIterator("../uploads");
foreach ($dossier as $fichier) {
    if ($fichier->isDot()) continue;

    $nomDossier = $fichier->getFilename();
    $sousDossier = new DirectoryIterator($fichier->getPathname());
    foreach ($sousDossier as $fichierInterne) {
        if ($fichierInterne->isDot() || $fichierInterne->getFilename() === 'info.txt') continue;

        $ext = strtolower(pathinfo($fichierInterne->getFilename(), PATHINFO_EXTENSION));
        if (in_array($ext, ['zip', 'pptx'])) {
            $cheminComplet = $nomDossier . '/' . $fichierInterne->getFilename();

            echo 'Nom du fichier : ' . str_replace('-', ' ', $cheminComplet) . '<br>';
            echo '<form method="post" action="edit.php">';
            echo '<input type="hidden" name="nom_fichier" value="' . $nomDossier . '">';
            echo '<button type="submit">Modifier le fichier</button>';
            echo '</form>';

            echo '<form method="post" action="delete.php" onsubmit="return confirm(\'Êtes-vous sûr de vouloir supprimer ce dossier ?\') && confirm(\'La destruction de ce dossier est définitive. Confirmer ?\');">';
            echo '<input type="hidden" name="nom_fichier" value="' . $nomDossier . '">';
            echo '<button type="submit">Supprimer le fichier</button>';
            echo '</form>';

            echo '<form method="post" action="download.php">';
            echo '<input type="hidden" name="nom_fichier" value="' . $cheminComplet . '">';
            echo '<button type="submit">Télécharger le fichier</button>';
            echo '</form>';
            echo '<br><br>';
        }
    }
}
?>


<footer>
    <p>&copy; 2025. Projet Solution Web EPSI. Tous droits réservés.</p>
</footer>

</body>
</html>