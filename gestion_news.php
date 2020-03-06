<!DOCTYPE html>
<html lang="fr" dir="ltr">
   <head>
	   <meta charset="utf-8">
	   <title>Espace de modification d'article</title>
	   <style>
	   	#espaceErreur {
			font-weight: bold;
		}
	   </style>
   </head>
   <body>
	   <div id="espaceErreur">
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
					$articleContent = str_replace("\n", "<br>", $articleContent);
					file_put_contents($fileToEdit, $articleContent);

					echo "Texte modifié avec succès !<br>";
					echo "<a href='index.php' target='_blank'>Prévisualiser</a>";
				}
			}



			 ?>
	 	</div>
		<form action="gestion_news.php" method="post">
			<textarea name="article" rows="8" cols="80">
				<?php include($fileToEdit); ?>
			</textarea>
			<input type="submit" name="bouton" value="envoyer">
		</form>
	</body>
</html>
