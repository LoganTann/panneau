<?php

$articleContent = $_POST["article"];

file_put_contents("art1.html", $articleContent);
header("Location: index.php");
 ?>
