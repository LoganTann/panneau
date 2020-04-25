<?php
  include '../functions.php';
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Liste des comptes</title>
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
    <p id="gestionNav">
      <a href="../index.php">Espace administration du panneau</a> >
      <a href="list_accounts.php">Liste des comptes</a>
    </p>
    <div id="espaceErreur">
      <h1>Liste des comptes</h1>
    </div>
    <?php
      getAllAccountsNames($db);
     ?>
  </body>
</html>
