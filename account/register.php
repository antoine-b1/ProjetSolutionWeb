<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inscription </title>
    <link href="../css/styles.css" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTS5VYolg4PlHUkQ7wMn4lTENI-rS9XfFDTOg&s">
</head>
<body>

<?php
$servername = ""; 
$username = ""; 
$password = ""; 
$dbname = ""; 

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastName = $_POST["lastName"];
    $firstName = $_POST["firstName"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $classe = $_POST["classe"];

    $sql = "INSERT INTO `users` (`lastName`, `firstName`, `email`, `password`, `classe`) VALUES (:lastName, :firstName, :email, :password, :classe)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':classe', $classe);

    if ($stmt->execute()) {
        echo "Le compte utilisateur a été créé avec succès.";
    } else {
        echo "Il y a eu une erreur lors de la création du compte utilisateur.";
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
