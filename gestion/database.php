<?php

include("functions.php");
//$reponse = $db->query('SELECT * FROM `accounts`');

// récupérer tous les profs absents
//  $reponse = $db->query('SELECT name FROM accounts WHERE is_here=0 AND is_student=0');
editInfos($db, "lapatate", "2000-06-27", 1, 0);

/*
while ($donnees = $reponse->fetch()) {
	// `card_id`, `name`, `birthday`, `is_student`, `is_here`
	echo "<hr>";
	echo $donnees["name"], " a pour numéro d'étudiant : ", $donnees["card_id"], "<br>";
	echo "sa datre d'anniv est : ", $donnees["birthday"], " et il est actuellement : ";
	if ($donnees["is_student"]) {
		echo "etudiant";
	} else {
		echo "adulte";
	}
	echo "<br>", ($donnees["is_here"])? "Présent aujd" : "Absent aujd";
}*/


?>
