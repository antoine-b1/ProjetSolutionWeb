<?php
$servername = "localhost"; 
$username = "login8146"; 
$password = "LCBREoqRfhbcJGz"; 
$dbname = "dbProjetWeb"; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("La connexion a échoué : " . $e->getMessage());
}
?>
