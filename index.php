<?php
require 'gestion/functions.php';

$delay = 8;
header("refresh: $delay");

$articlesFileList = glob("articles/[[:digit:]]#*.html");
$max = count($articlesFileList);
natsort($articlesFileList); // pas forcément utile... mais bon.

$article_id = &$_SESSION['idOfArticleToDisplay'];
// Passe la variable par référence : tout changement dans $article_id changera
//   la variable $_SESSION['idOfArticleToDisplay']
//   Bon à savoir : passer la référence d'une variable indéfinie va la créer
//   automatiquement avec comme valeur NULL.

if (!is_numeric($article_id)) { // valeur par défaut
	$article_id = 0;
}

if ($article_id < $max - 1) {
	$article_id++;
} else {
	$article_id = 0;
}

$articlePath = $articlesFileList[$article_id];
list($extracted_id, $article_name) = extractArticleIdAndNames($articlePath, '');
$articleContent = file_get_contents($articlePath);
$article_generated = str_replace("\n", "<br>", $articleContent);
 ?>

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
				<h1 id="BannerTitle"><?php echo $article_name; ?></h1>
			</div>
		</div>
		<div id="content">
		<?php
			echo $article_generated;
		?>
		</div>
	</body>
</html>
