<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Espace de création de comptes</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<p id="gestionNav">
		<a href="index.php">Espace de gestion</a> >
		<a href="accounts.php">Formulaire de création de comptes</a>
	</p>
	<div id="espaceErreur">
		<h1>Liste des articles à éditer</h1>
	</div>
	<div id="ListeFichier">
		<?php
		session_start();
		if (empty($_SESSION['admin'])) {
			echo "<p>Vous n'avez pas les droits requis pour accéder à cette page. <a href='./'>Connectez-vous ici</a></p>";
		} else {
			$articlesFileList = glob("../articles/*.html");
			// TODO: Utiliser des noms d'articles plutôt que des numéros.
			foreach ($articlesFileList as $i => $path) {
				echo "<a class=\"fichier\" href='news.php?article=$path'>Article ",$i+1,"</a><br>";
			}
			echo '<a href="news.php?article=../articles/art',count($articlesFileList)+1,'.html"><input method="post" class="btn_1" type="button" value="Nouvel Article" name="New"></a>';
		}
		?>
	</div>
</body>
</html>
