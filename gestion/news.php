<!DOCTYPE html>
<html lang="fr" dir="ltr">
   <head>
	   <meta charset="utf-8">
	   <title>Espace de modification d'article</title>
	   <link rel="stylesheet" href="gestion_style.css">
	   <style>
	   	textarea {
			height: 70vh; /* 70 view (écran) height*/
			margin-top: 20px;
		}
	   </style>
   </head>
   <body>
	   <p id="gestionNav">
		   <a href="gestion_index.php">Espace de gestion</a> >
		   <a href="gestion_news.php">Modification de "art 1"</a>
	   </p>
	   <div id="espaceErreur">
		   <h1>Modification de "art1"</h1>
			<?php
			$fileToEdit = "art1.html";
			if ( ! empty($_POST["bouton"]) ) {
				// Si on a cliqué sur le bouton
				if ( empty($_POST["article"]) ) {
					// Si l'article est vide, faire :
					echo "Erreur : texte vide !";
				} else {
					$articleContent = $_POST["article"];
					// Si c'est okay alors :
					file_put_contents($fileToEdit, $articleContent);

					echo "Texte modifié avec succès !<br>";
					echo "<a href='index.php' target='_blank'>Prévisualiser</a>";
				}
			}



			 ?>
	 	</div>
		<form action="gestion_news.php" method="post">
			<input type="submit" name="bouton" value="envoyer" id="submitBtn">
			<textarea name="article" rows="8" cols="80"><?php include($fileToEdit); ?></textarea><br>
		</form>
	</body>
</html>
