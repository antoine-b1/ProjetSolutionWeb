<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Connexion </title>
    <link rel="stylesheet" href="../css/login.css">

    <link rel="icon" type="image/png" href="../image/logoEpsi/images.png">
</head>
<body>

<?php



session_start();
require '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["mot_de_passe"];

    $sql = "SELECT * FROM utilisateurs WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["mot_de_passe"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["role"] = $user["role"];

        if ($user["role"] === "admin") {
            header("Location: ../Admin/indexAdmin.php");
        } else {
            header("Location: ../User/indexUser.php");
        }
        exit;
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
?>




<header>
    <img src="../image/logoEpsiWis/logoEpsi.png" alt="Logo EPSI/WIS" class="logoepsi" width="85" height="80">
    <h1 class="green"> Page de connexion </h1>
</header>
<div class="title"> Connexion </div> <br>
    <form method="post" action=""> <br>
        <label for=""> Nom : </label>
        <input type="text" name="lastName" required/> <br> <br>
        <label for=""> Prénom : </label>
        <input type="text" name="firstName" required/> <br> <br>
        <label for=""> Email : </label>
        <input type="email" name="email" required/> <br> <br>
        <label for=""> Mot de passe : </label>
        <input type="password" name="mot_de_passe" required/> <br> <br>
        <input type="submit" value="Se connecter" name="envoyer">
    </form> <br>
Si vous n'avez pas de compte, veuillez vous inscrire :
<a href="register.php"> Page d'inscription </a>
</body>
</html>
