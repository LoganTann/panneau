<!DOCTYPE html>
<html lang="fr" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div id="header">
			<div id="Banner">
				<h1 id="BannerTitle">LPL - Tableau de bord</h1>
			</div>
		</div>
		<div id="content">
		<?php
			$art = glob("articles/*.html");
			$i = 1;
			foreach($art as $v){
				echo '<div class="Article">';
				echo "<h1 class=\"ArticleTitle\">Article ".$i."</h1>";
				echo '<div class="ArticleContent">';
				echo '<p>';
				$articleContent = file_get_contents($v);
				$articleTraité = str_replace("\n", "<br>", $articleContent);
				echo $articleTraité."</p>";
				echo '</div>';
				echo '</div>';
				$i++;
			}
		?>
		</div>
	</body>
</html>
