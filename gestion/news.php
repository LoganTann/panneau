<?php

// Espace de modification / création d'articles

include 'functions.php';
abortIfNotAdmin();

if (isset($_GET['article'])){
	$_SESSION['article'] = $_GET["article"];
	$fileToEdit = $_GET['article'];
} elseif (isset($_SESSION['article'])){
	$fileToEdit = $_SESSION['article'];
}else{
	$fileToEdit = "";
}
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
   <head>
	   <meta charset="utf-8">
	   <title>Espace de modification d'article</title>
	   <link rel="stylesheet" href="style.css">
	   <style>
	   	textarea {
			height: 70vh; /* 70 view (écran) height*/
			margin-top: 20px;
		}
	   </style>
   </head>
   <body>
	   <p id="gestionNav">
		   <a href="index.php">Espace de gestion</a> >
		   <a href="news.php">Modification de <?php echo $fileToEdit; ?>"</a>
	   </p>
	   <div id="espaceErreur">
			<?php
				echo '<h1>Modification de «'.$fileToEdit.'»</h1>';
				if (!empty($_POST["bouton"])) {
					// Si on a cliqué sur le bouton
					if (empty($_POST["article"])) {
						// Si l'article est vide, faire :
						echo "Erreur : texte vide !";
					} elseif(!empty($fileToEdit)) {
						$articleContent = $_POST["article"];
						// Si c'est okay alors :
						file_put_contents($fileToEdit, $articleContent);

						echo "Texte modifié avec succès !<br>";
						echo "<a href='../' target='_blank'>Prévisualiser</a>";
					}
				}
			 ?>
		 </div>
		 <?php
		 if ($_SESSION['admin'] == true){
			 echo '
			<form action="?" method="post">
				<input type="submit" name="bouton" value="envoyer" id="submitBtn">
				<textarea name="article" rows="8" cols="80">';
					$new = file_exists($fileToEdit);
					if (!empty($fileToEdit && $new == true)){
						include $fileToEdit;
					}
			echo '</textarea><br>
			</form>';
		  } ?>
	</body>
</html>
