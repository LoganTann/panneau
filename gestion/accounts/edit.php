<?php
// TODO: Fusionner accounts et accounts_admin qui possèdent la même fonction.
require '../functions.php';
abortIfNotAdmin();

$db = new PDO('mysql:host=localhost;dbname=panneau;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

function traitement() {
  if (isset($_GET['card_id'])){
    $cardid = $_GET['card_id'];
  }
	$dbID = 'root';
	$dbPassword = '';
	$db = new PDO('mysql:host=localhost;dbname=panneau;charset=utf8', $dbID, $dbPassword, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	if (empty($_POST["bouton"])) {
		return "";
	}
	if (empty($_POST["name"])) {
		// Si le nom est vide, faire :
		return "Erreur : pas de nom !";
	}
	if (empty($_POST["birthday"])) {
		// Si l'anniversaire est vide, faire :
		return "Erreur : Pas de date d'anniversaire valide !";
	}

	if (empty($_POST["status"])) {
		$status = "Élève";
	} else {
		$status = "Professeur";
	}
	$valeurRetour = "Nom envoyé : <i>".$_POST["name"]."</i>";
	$valeurRetour .= " Date d'anniv: <i>".$_POST["birthday"]."</i>";
	$valeurRetour .= " Statut : <i>".$status."</i>";

	$birthday = $_POST['birthday'];
	$name = $_POST['name'];
	if($status == "Élève"){
		$isStudent = 1;
	}else{
		$isStudent = 0;
	}

	editInfos($db, $name, $birthday, $isStudent, 1, $cardid);
	return $valeurRetour;
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Espace de création de comptes</title>
	<link rel="stylesheet" href="../style.css">
</head>
<body>
	<p id="gestionNav">
		<a href="../">Espace de gestion</a> >
		<a href="./">Gestion des comptes</a> >
		<a href="?">Formulaire de modification de comptes</a>
	</p>
	<div id="espaceErreur">
		<h1>Formulaire de modification de comptes</h1>
		<?php echo traitement(); ?>
	</div>
  <div>
    <?php
    $entry = $db->prepare("SELECT * FROM accounts");
    $entry->execute();
    $uc = $entry->rowcount();
    $i = 1;
    while ($i <= $uc) {
      $reqname = $db->query("SELECT name FROM accounts WHERE card_id=$i");
      $retour = $reqname->fetch();
      $name[$i] = $retour[0];
      $i++;
    }
    foreach ($name as $key => $value) {
      echo "$key <a href=\"?card_id=$key\">$value</a><br>";
    }
    ?>
  </div>
  <?php
  if (isset($_GET['card_id'])){
    $cardid = $_GET['card_id'];
    $reqbirth = $db->query("SELECT birthday FROM accounts WHERE card_id=$cardid");
    $retour = $reqbirth->fetch();
    $birthday = $retour[0];
    echo '<form action="" method="post">
      <table>
        <tbody>
          <tr>
            <td>
              <input type="text" name="name" placeholder="NOM prénom" value="'.$name[$cardid].'">
              <br><br>
              <input type="date" name="birthday" value="'.$birthday.'">
              <br><br>
              <select name="status">
                <option value="">Élève</option>
                <option value="true">Professeur</option>
              </select>
            </td>
            <td id="formValidation">
              <input type="submit" name="bouton" value="Modifier le compte" id="submitBtn">
            </td>
          </tr>
        </tbody>
      </table>
    </form>';
  }
  ?>
</body>
</html>
