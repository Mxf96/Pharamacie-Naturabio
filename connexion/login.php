<?php
require_once '../includes/inc-db-connect.php';
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pharmacie NaturaBio - Connexion</title>
	<link rel="stylesheet" href="/assets/css/styleslogin.css">
</head>

<body>
	<div class="container">
		<div class="register-box">
			<a href="/index.php">Retour</a>
			<a href="/inscription/register.php" class="register">S'inscrire</a>
			<h1>Connexion</h1>
			<form action="login-POST.php" method="POST">
				<div class="input-group">
					<label>Email: </label>
					<input type="email" name="email_utilisateur">
				</div>
				<div class="input-group">
					<label>Mot de passe: </label><br>
					<input type="password" name="mdp_utilisateur">
				</div>
				<div class="input-group">
					<input type="submit" class="button" name="submit" value="Connexion">
				</div>
			</form>
		</div>
	</div>
</body>

</html>