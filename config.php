<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "inscrdb";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    // Définition du mode d'erreur de PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    // Vous pouvez rediriger l'utilisateur ou afficher un message d'erreur approprié ici
    exit();
}
?>
