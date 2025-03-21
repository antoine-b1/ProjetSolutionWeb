<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Connexion </title>
    <link href="../css/styles.css" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTS5VYolg4PlHUkQ7wMn4lTENI-rS9XfFDTOg&s">
</head>
<body>

<?php
$servername = "localhost"; 
$username = "login8143"; 
$password = "bSNNMXOKflUFBdV"; 
$dbname = "dbProjetWeb";  

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "La connexion a échoué : " . $e->getMessage();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `users` WHERE `email` = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);


if ($user && password_verify($password, $user['password'])) {
    if ($user['classe'] == 'Admin') {
        header("Location: ../Admin/indexAdmin.php");
    } else {
        header("Location: ../User/indexUser.php");
    }
    exit();
} else {
    echo "Échec de la connexion. Veuillez vérifier votre email et votre mot de passe.<br> <br>";
    exit();
}
}


?>

<header>
    <img src="https://www.nuitdelinfo.com/inscription/uploads/ecoles/573/logos/logo.png" alt="Logo EPSI/WIS" class="logoepsi" width="85" height="80">
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
        <input type="password" name="password" required/> <br> <br>
        <label for=""> Classe : </label>
        <input type="text" name="classe" required/> <br> <br>
        <input type="submit" value="Se connecter" name="envoyer">
    </form> <br>
Si vous n'avez pas de compte, veuillez vous inscrire :
<a href="register.php"> Page d'inscription </a>
</body> 
</html>
