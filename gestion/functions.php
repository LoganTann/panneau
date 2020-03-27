<?php
/* FUNCTIONS.PHP
 * utilitaires automatisant certaines tâches. à importer avec include.
*/

try {
    $db = new PDO('mysql:host=localhost;dbname=panneau;charset=utf8', 'root', "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e) { die('Erreur : '.$e->getMessage()); }


function listFilesInsideFolder($pattern = "./") {
	/*	Retourne la liste de tous les fichiers correspondant à $pattern
		utilisable pour afficher la liste des articles disponibles */
	$retval = ["art1", "art2"];
	return $retval;
}

function getDatabaseInstance() {
	/* Permet la connection de la base de donnée. Retourne l'objet permettant
	   de faire des manipulations sur la base de données*/
	$db = function($arg){return "Appel de la fonction $arg dans la base de données";};
	return $db;
}

function editInfos($db, $name, $birthday, $is_student, $is_here, $id='-1') {
	/* Modifie les informations de $id : nom, anniv, est étudiant, est présent
	Si ID = -1 (défaut) c'est qu'on crée un nouvel étudiant*/
	if ($id == "-1") {
		$reponse = $db->query("
			INSERT INTO `accounts` (`card_id`, `name`, `birthday`, `is_student`, `is_here`)
							VALUES (NULL, '$name', '$birthday', '$is_student', '$is_here')");
	} else {
		$reponse = $db->query("
			UPDATE `accounts` SET name = $name, birthday = $birthday, is_student = $is_student, is_here = $is_here
			WHERE card_id = $card_id");
	}

	$retval = "FAIT !";
	return $retval;
}
function getInfos($db, $id) {
	/* Renvoie sous forme de liste les informations de $id*/
	$reponse = $db->query("SELECT * FROM `accounts` WHERE card_id=$id");
	return $reponse->fetch();
}
function getAllStudentNames($db) {
	/*	Renvoie un tableau associatif qui contient en clé l'id de la personne et
		en contenu le nom de la personne.
	*/
	$retval = array('1' => "Logan", "2" => "Camille", "3" => "Romain", "4" => "Le prof");
	return $retval;
}

 ?>
