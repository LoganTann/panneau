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
 		   <h1>Liste des articles à éditer</h1>
 	   </div>
     <div id="ListeFichier">
    		<?php
			session_start();
			if ($_SESSION['admin'] == true){
				$liste_fichiers = glob("../articles/*.html");
				$i = 1;
				foreach ($liste_fichiers as $value) {
					echo "<a class=\"fichier\" href='news.php?article=$value'>Article $i</a><br>";
					$i++;
				}
        echo '<a href="news.php?article=../articles/art'.$i++.'.html"><input method="post" class="btn_1" type="button" value="Nouvel Article" name="New"></a>';
		  }
			?>
    </div>
 	</body>
 </html>
