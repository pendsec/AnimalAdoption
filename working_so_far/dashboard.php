<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'root';
$password = 'cmpsc431-mysql-root';
$host = 'localhost';
$dbname = '431W_Final';
?>

<?php include ("functions.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="/CSS/adoption & fostering.css">
</head>
<body>
    <a href="animal_manage.php"><button id="cancel">Cancel</button></a>
    <a href="employees.php"><button id="cancel">Cancel</button></a>
    <a href="adopter.php"><button id="cancel">Cancel</button></a>
</body>
</html>