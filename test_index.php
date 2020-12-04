<!DOCTYPE html>
<html>
<body>
<h1> hello there </h1>
<?php
// need this to show syntax errors in included file
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("functions.php");

echo "hello"."<br>";
$q = getShelters();
while ($row = $q->fetch()):
	echo implode(" | ", $row)."<br>";
endwhile;

$q = describeAnimal();
while ($row = $q->fetch()):
	echo implode(" | ", $row)."<br>";
endwhile;
?>
</body>
</html>
