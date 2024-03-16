<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
?>   
<!DOCTYPE html>
<html>
<head>
<style>
     body {
	background: beige;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
	flex-direction: column;
     }
     input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-top: 20px;
      background-color: orange;
      color: white;
      border: none;
      border-radius: 15px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      opacity: .5;
    }

</style>

	<title>HOME</title>
     
	
</head>
<body>
     <h1>Bienvenu, <?php echo $_SESSION['username']; ?></h1>
     <a href="deconnexion.php"> <input type="submit" value="DECONNEXION"></a>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>

