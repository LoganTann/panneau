<?php

$articleContent = $_POST["article"];

if ( empty($articleContent) ) {
	// si c'est vide, faire :
	echo "<b>Erreur : texte vide !</b>";
	echo "<a href='gestion_news.php'>Revenir en arrière</a>";
} else {
	// Si c'est okay alors :
	$articleContent = str_replace("\n", "<br>", $articleContent);

	file_put_contents("art1.html", $articleContent);
	header("Location: index.php");
}
 ?>
