<!DOCTYPE html>
<html>
<head>
<title>LOGIN</title>
  <style>
    body {
	background: beige;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
	flex-direction: column;
}


    
    form {
        
      width: 320px;
      margin:  auto;
      padding: 20px;
      border: 1px solid #ccc;
      box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
      margin-top: 160px;
      background: #fff;
    }

    h2 {
	text-align: center;
	margin-bottom: 40px;
}
    label {
      display: block;
      margin-top: 10px;
    }
    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
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
    .error {
   background: #F2DEDE;
   color: #A94442;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}
  </style>
</head>
<body>
  <form action="login.php" method="post">
  <h2>CONNEXION</h2>
  <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" id="username" name="username" >
    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" >
    <input type="submit" value="CONNEXION">
  </form>
</body>
</html>