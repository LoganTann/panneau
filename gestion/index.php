<?php
//test notif
	session_start();
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Espace de gestion</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<p id="gestionNav">
			<a href="index.php">Espace de gestion</a>
		</p>
		<div id="espaceErreur">
			<h1>Espace de gestion</h1>
		</div>
		<div class="biggerText">
			<?php
				if ( empty($_SESSION["admin"]) ) {
					echo '<a href="register.php">Sign in</a>';
				}else {
					echo "Tu es admin";
				}
			 ?>
			<p>Disponible :</p>
			<ul>
				<li><a href="accounts.php">Ajouter un compte</a></li>
				<li><a href="liste_fichiers.php">Modifier la nouvelle</a></li>
			</ul>

			<p>Test :</p>
			<ul>
				<li><a href="choose.php">Gestion des comptes</a></li>
			</ul>

			<p>Indisponible :</p>
			<ul>
				<li><a href="#">Signaler une absence</a></li>
				<li><a href="#">Modifier les comptes</a></li>
			</ul>

			<p>À faire : </p>
			<ul>
				<li>la page gestion compte doit avoir le choix du compte à modifier.</li>
				<li>la page gestion article doit lister les articles diponibles.</li>
				<li>faire la page d'affichage pour des articles multiples.</li>
				<li>faire un système de session afin de ne pas avoir à taper le mdp tt le temps</li>
			<ul>
		</div>
	</body>
</html>
