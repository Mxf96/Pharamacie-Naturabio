<?php
session_start();
require_once '../includes/inc-db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST['email_utilisateur']) && !empty($_POST['mdp_utilisateur'])) {
		$email = htmlspecialchars(strip_tags(trim($_POST['email_utilisateur'])));
		$password = strip_tags(trim($_POST['mdp_utilisateur']));

		$sql = "SELECT u.*, r.id_role FROM utilisateurs u
				INNER JOIN assigner a ON u.id_utilisateur = a.id_utilisateur
				INNER JOIN roles r ON a.id_role = r.id_role
				WHERE u.email_utilisateur = ?";
		$stmt = $dbh->prepare($sql);
		$stmt->execute([$email]);
		$user = $stmt->fetch();

		if ($user && password_verify($password, $user['mdp_utilisateur'])) {
			$_SESSION['id_utilisateur'] = $user['id_utilisateur'];
			$_SESSION['nom_utilisateur'] = $user['nom_utilisateur'];
			$_SESSION['prenom_utilisateur'] = $user['prenom_utilisateur'];

			if ($user['id_role'] == 1) {
				header("Location: /admin/menu.php");
			} elseif ($user['id_role'] == 2) {
				header("Location: /index.php");
			} else {
				header("Location: login.php?error=invalidrole");
				exit();
			}
		} else {
			header("Location: login.php?error=invalidcredentials");
			exit();
		}
	} else {
		header("Location: login.php?error=emptyfields");
		exit();
	}
}
?>
