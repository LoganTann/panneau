<?php



try {
    $db = new PDO('mysql:host=localhost;dbname=panneau;charset=utf8', 'root', "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e) { die('Erreur : '.$e->getMessage()); }


$reponse = $db->query('SELECT * FROM `accounts`');

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
}
//include("functions.php");


?>
