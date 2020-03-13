<!DOCTYPE html>
<html lang="fr" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>

Article 1 :
		<p><?php
		$articleContent = file_get_contents("articles/art1.html");
		$articleTraité = str_replace("\n", "<br>", $articleContent);
		echo $articleTraité;
		 ?></p>
	</body>
</html>
