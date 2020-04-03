<!DOCTYPE html>
<html lang="fr" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
		$art = glob("articles/*.html");
		$i = 1;
		foreach($art as $v){
			echo "<h1>Article ".$i."</h1>";
			echo '<p>';
			$articleContent = file_get_contents($v);
			$articleTraité = str_replace("\n", "<br>", $articleContent);
			echo $articleTraité."</p>";
			$i++;
		}
			 ?>
	</body>
</html>
