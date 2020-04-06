<?php
include 'functions.php';

// THIS FILE'S FUNCTIONS =====
function checkConnection($isNotAdmin) {
	$adminPassword = "LA PATATE";
	if ($isNotAdmin) {
		if (empty($_POST["password"])) {
			return "";
		} else if ($_POST["password"] != $adminPassword) {
			return "wrongPassword";
		}
		$_SESSION["admin"] = true;
	}
	return "ok";
}
function printTemplate_Login() {
	echo form(
		p("Entrez le mot de passe d'administration : ").
		input("password", "password").
		p(br()).
		input("Connect", "submit", "Cliquez ici pour vous connecter")
	);
}
function printTemplate_Index() {
	echo p("Disponible :");
	echo ul(
			a("accounts.php", "Ajouter un compte"),
			a("liste_fichiers.php", "Modifier la nouvelle")
		 );
	echo p("Test :");
	echo ul(
			a("choose.php", "Gestion des comptes")
		 );
	echo p("Indisponible :");
	echo ul(
			a("#", "Signaler une absence"),
			a("#", "Modifier les comptes")
		 );
	echo p("À faire :");
	echo ul(
			"la page gestion compte doit avoir le choix du compte à modifier.",
			"la page gestion article doit lister les articles diponibles.",
			"faire la page d'affichage pour des articles multiples."
		 );
}
function print_goodTemplate($status) {
	if ($status == "ok") {
		printTemplate_Index();
	} else {
		printTemplate_Login();
	}
}

// MAIN CODE =====

$connectionStatus = checkConnection( $isNotAdmin );
$title = "Merci de s'identifier pour accéder au panneau d'administration";
$erreur = "";

if ($connectionStatus == "ok") {
	$title = "Espace administration du panneau";
} else if ($connectionStatus == "ok") {
	$erreur = "Mot de passe incorrect !!";
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<p id="gestionNav">
			<a href="index.php"><?php echo $title; ?></a>
		</p>
		<div id="espaceErreur">
			<h1><?php echo $title; ?></h1>
			<p><?php echo $erreur; ?></p>
		</div>
		<div class="biggerText">
			<?php print_goodTemplate($connectionStatus); ?>
		</div>
	</body>
</html>
