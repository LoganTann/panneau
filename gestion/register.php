<?php

// Formilaire de connection en tant qu'admin pour accéder aux fonctions d'administration

  session_start();
  $_SESSION["admin"] = false;
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Engeristrement compte administrateur</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <p id="gestionNav">
      <a href="index.php">Espace de gestion</a> >
      <a href="accounts.php">Formulaire de création de comptes</a> >
      <a href="register.php">Enregistrement</a>
    </p>
    <div id="espaceErreur">
      <h1>Compte administrateur</h1>
      <?php
      function register() {
        if ( empty($_POST["bouton2"]) ) {
          return "";
        }
        if ( empty($_POST["identifiant"]) ) {
          return "Erreur : pas d'identifiant renseigné. Veuillez en entrer un !" ;
        }
        if ( empty($_POST["password2"]) ) {
          return "Erreur : pas de mot de passe envoyé. Veuillez en entrer un !";
        }
        if ($_POST["identifiant"] !== "LAPATATE" ) {
          return "Erreur : identifiant non valable" ;
        }
        if ($_POST["password2"] !== "admin") {
          return "Erreur : mauvais mot de passe";
        }
          $_SESSION["admin"] = true;
          header("Location:index.php");
          exit;
      }

      echo register();
      ?>
    </div>
    <form action="register.php" method="post"> <table><tbody><tr>
      <td>
        Entre ton identifiant :
        <input type="text" name="identifiant" value=""> <br><br>
        Tape ton mot de passe :
        <input type="password" name="password2" value=""> <br><br>
      </td>
      <td id="formValidation">
        <input type="submit" name="bouton2" value="valider  " id="submitBtn">
      </td>
    </form>
  </body>
</html>
