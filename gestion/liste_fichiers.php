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
 		   <h1>Liste des articles pour édtiter</h1>
 	   </div>

		<?php
		session_start();
		if (isset($_SESSION['isadmin'])){
			$liste_fichiers = glob("../articles/*.html");
			$i = 1;
			foreach ($liste_fichiers as $value) {
				echo "<a href='news.php?article=$value'>Article $i</a><br>";
				$i++;
			}
	    }
		?>
 	</body>
 </html>