<?php 
session_start(); 
include "config.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $uname = validate($_POST['username']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.php?error=Nom d'utilisateur est nécessaire");
        exit();
    } elseif (empty($pass)) {
        header("Location: index.php?error=Mot de passe requis");
        exit();
    } else {
        // hashing the password
        $pass = md5($pass);

        // Établir une connexion à la base de données
        $conn = mysqli_connect($servername, $username, $password, $db_name);

        // Vérifier la connexion
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Préparer la requête SQL
        $sql = "SELECT * FROM utilisateur WHERE username=?";
        
        // Préparer la requête
        $stmt = mysqli_prepare($conn, $sql);
        
        // Liage des paramètres
        mysqli_stmt_bind_param($stmt, "s", $uname);
        
        // Exécution de la requête
        mysqli_stmt_execute($stmt);
        
        // Récupération du résultat
        $result = mysqli_stmt_get_result($stmt);

        // Vérifier si un seul résultat a été retourné
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) {
                $_SESSION['username'] = $row['username'];
                
                
                header("Location: dashboard.php");
                exit();
            } else {
                header("Location: index.php?error=Nom d'utilisateur ou mot de passe incorrect");
                exit();
            }
        } else {
            header("Location: index.php?error=Nom d'utilisateur ou mot de passe incorrect");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
