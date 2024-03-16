<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "inscrdb";

// Établir une connexion à la base de données
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Vérifier la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['re_password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['username']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);
   

    $user_data = 'username='. $uname;

    if (empty($uname)) {
        header("Location: signup.php?error=Nom d'utilisateur est nécessaire&$user_data");
        exit();
    } elseif (empty($pass)) {
        header("Location: signup.php?error=Le mot de passe est requis&$user_data");
        exit();
    } elseif (empty($re_pass)) {
        header("Location: signup.php?error=La confirmation du  mot de passe est requis&$user_data");
        exit();

    } elseif ($pass !== $re_pass) {
        header("Location: signup.php?error=Le mot de passe de confirmation ne correspond pas&$user_data");
        exit();
    } else {
        // Hachage du mot de passe
        $pass = md5($pass);

        // Vérifiez si le nom d'utilisateur existe déjà
        $sql = "SELECT * FROM utilisateur WHERE username=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $uname);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=Le nom d'utilisateur est déjà pris. Essaie un autre&$user_data");
            exit();
        } else {
            // Insérer les données utilisateur dans la base de données
            $sql2 = "INSERT INTO utilisateur (username, password) VALUES (?, ?)";
            $stmt2 = mysqli_prepare($conn, $sql2);
            mysqli_stmt_bind_param($stmt2, "ss", $uname, $pass);
            $result2 = mysqli_stmt_execute($stmt2);

            if ($result2) {
                header("Location: signup.php?success=Votre compte a été créé avec succès");
                exit();
            } else {
                header("Location: signup.php?error=Une erreur inconnue s'est produite&$user_data");
                exit();
            }
        }
    }
} else {
    header("Location: signup.php");
    exit();
}
?>
