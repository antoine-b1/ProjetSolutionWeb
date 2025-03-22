<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inscription </title>
    <link href="../css/inscription.css" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="../image/logoEpsi/images.png">
</head>
<body>

<?php
require '../config/database.php';
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);
    $role = "utilisateur";

    
    $check = $conn->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $check->execute(['email' => $email]);
    if ($check->rowCount() > 0) {
        $message = "<p style='color:red;'>Cet email est déjà utilisé.</p>";
    } else {
        $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role) 
                VALUES (:nom, :prenom, :email, :mot_de_passe, :role)";
        $stmt = $conn->prepare($sql);
        $success = $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            ':mot_de_passe' => $mot_de_passe,
            ':role' => $role
        ]);

        if ($success) {
            header("Location: login.php");
            exit();
        } else {
            $message = "<p style='color:red;'>Erreur lors de l'inscription.</p>";
        }
    }
}
?>

<header>
    <img src="../image/logoEpsiWis/logoEpsi.png" alt="Logo EPSI/WIS" class="logoepsi" width="85" height="80">
    <h1 class="green"> Page d'inscription </h1>
</header>
<div class="title"> Inscription </div>
<br>
<form method="post" action="">
    <br>
    <label for="nom"> Nom : </label>
    <input type="text" name="nom" required/>
    <br><br>
    <label for="prenom"> Prénom : </label>
    <input type="text" name="prenom" required/>
    <br><br>
    <label for="email"> Email : </label>
    <input type="email" name="email" required/>
    <br><br>
    <label for="mot_de_passe"> Mot de passe : </label>
    <input type="password" name="mot_de_passe" required/>
    <br><br>
    <input type="submit" value="S'inscrire" name="envoyer">
</form>
<br>
Si vous ne possédez pas de compte, veuillez en créer un :
<a href="login.php"> Page de connexion </a>

</body>
</html>
