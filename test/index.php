<?php

require '../gestion/functions.php';

echo "displayTodaysBirthday(\$db) : ";
displayTodaysBirthday($db);
echo "<br>displayCurrentDay() : ";
displayCurrentDay();
echo "<br>displayCurrentTime() : ";
displayCurrentTime();
echo "<br>displayAbsentTeacher() : ";
displayAbsentTeacher($db);
?>
