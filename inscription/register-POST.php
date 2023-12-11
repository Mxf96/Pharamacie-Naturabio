<?php
require_once '../includes/inc-db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$nom = htmlspecialchars(strip_tags(trim($_POST['nom_utilisateur'])));
	$prenom = htmlspecialchars(strip_tags(trim($_POST['prenom_utilisateur'])));
	$email = htmlspecialchars(strip_tags(trim($_POST['email_utilisateur'])));
	$password = strip_tags(trim($_POST['mdp_utilisateur']));
	$passwordConfirm = strip_tags(trim($_POST['mdp_confirmation']));

	if ($password !== $passwordConfirm) {
		header("Location: register.php?error=passwordcheck");
		exit();
	}

	$password = password_hash($password, PASSWORD_BCRYPT);

	$sql = "INSERT INTO utilisateurs (nom_utilisateur, prenom_utilisateur, email_utilisateur, mdp_utilisateur) VALUES (?, ?, ?, ?)";
	$stmt = $dbh->prepare($sql);
	$stmt->execute([$nom, $prenom, $email, $password]);

	$last_id = $dbh->lastInsertId();

	$sql = "INSERT INTO assigner (id_utilisateur, id_role) VALUES (?, 2)";
	$stmt = $dbh->prepare($sql);
	$stmt->execute([$last_id]);

	header("Location: ../connexion/login.php");
	exit();
} else {
	header("Location: register.php");
	exit();
}
?>