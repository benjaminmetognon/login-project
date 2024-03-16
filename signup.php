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

*{
	font-family: sans-serif;
	box-sizing: border-box;
}

form {
	  width: 400px;
      margin:  auto;
      padding: 20px;
      border: 1px solid #ccc;
      box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
     
      background: #fff;
}

h2 {
	text-align: center;
	margin-bottom: 40px;
}

input {
	display: block;
	border: 1px solid #ccc;
	width: 95%;
	padding: 10px;
	margin: 10px auto;
	border-radius: 5px;
}
label {
	
	font-size: 18px;
	padding: 10px;
}

button {
	float: right;
	background: blue;
	padding: 10px 15px;
	color: black;
	border-radius: 5px;
	margin-right: 10px;
	border: none;
}
button:hover{
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

.success {
   background: #D4EDDA;
   color: #40754C;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

.ca {
	font-size: 14px;
	display: inline-block;
	padding: 10px;
	text-decoration: none;
	color: #444;
}
.ca:hover {
	text-decoration: underline;
} 
</style>
	<title>SIGN UP</title>
	
</head>
<body>
     <form action="signup_validate.php" method="post">
     	<h2>S'INSCRIRE</h2>
		 <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

			<label>Nom d'utilisateur</label>
          <?php if (isset($_GET['username'])) { ?>
               <input type="text" 
                      name="username" 
					  <?php echo $_GET['username']; ?>><br>
          <?php }else{ ?>
               <input type="text" 
                      name="username" 
                     ><br>
          <?php }?>


     	<label>Mot de passe</label>
     	<input type="password" 
                 name="password" 
				 ><br>

          <label>Confirmer le mot de passe</label>
          <input type="password" 
                 name="re_password" 
				 ><br>

     	<button type="submit">S'inscrire</button>
          <a href="index.php" class="ca">Vous avez déjà un compte?<br/> Connectez-vous!</a><br/>
     </form>
</body>
</html>
