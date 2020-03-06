<!DOCTYPE html>
<html lang="fr" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>

Article 1 :
<br>
		<?php
		/*
		$texte = file_get_contents("fond.txt");
		print($texte);*/

		$articleContent = file_get_contents("art1.html");
		$articleTraité = str_replace("\n", "<br>", $articleContent);
		echo $articleTraité;
		 ?>
	</body>
</html>
