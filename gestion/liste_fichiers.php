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

		<?php
		session_start();
		$liste_fichiers = glob("../articles/*.html");
		foreach ($liste_fichiers as $value) {
			echo "<a href='news.php?article=$value'>$value</a><br>";
		}
		?>
 	</body>
 </html>
