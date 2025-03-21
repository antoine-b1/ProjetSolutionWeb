<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inscription </title>
    <link href="../css/inscription.css" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTS5VYolg4PlHUkQ7wMn4lTENI-rS9XfFDTOg&s">
</head>
<body>

<?php
$servername = "localhost"; 
$username = "login8146"; 
$password = "LCBREoqRfhbcJGz"; 
$dbname = "dbProjetWeb"; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['envoyer'])) {
        echo "L'inscription a été correctement effectuée ! ";
    }
} catch (PDOException $e) {
    echo "La connexion a échoué : " . $e->getMessage();
    exit();
}


require '../config/database.php'; // Assure-toi que le chemin est correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = "user"; // Rôle par défaut

    $sql = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':role', $role);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>


<header>
    <img src="https://www.nuitdelinfo.com/inscription/uploads/ecoles/573/logos/logo.png" alt="Logo EPSI/WIS" class="logoepsi" width="85" height="80">
    <h1 class="green"> Page d'inscription </h1>   
</header>
<div class="title"> Inscription </div>
<br>
<form method="post" action="">
    <br>
    <label for=""> Nom : </label>
    <input type="text" name="lastName" required/> 
    <br><br>
    <label for=""> Prénom : </label>
    <input type="text" name="firstName" required/> 
    <br><br>
    <label for=""> Email : </label>
    <input type="email" name="email" required/> 
    <br><br>
    <label for=""> Mot de passe : </label>
    <input type="password" name="password" required/> 
    <br><br>
    <label for=""> Classe : </label>
    <input type="text" name="classe" required/> 
    <br> <br>
    <input type="submit" value="S'inscrire" name="envoyer">
</form>
<br>
Si vous ne possédez pas de compte, veuillez en créer un :
<a href="login.php"> Page de connexion </a>

</body>
</html>
