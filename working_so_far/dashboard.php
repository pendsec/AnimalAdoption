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
    <h1>Employee Dashboard</h1>
    <link rel="stylesheet" href="/CSS/adoption & fostering.css">
</head>
<body>
    <a href="animal_manage.php"><button id="cancel">Animal Manage</button></a>
    <a href="employees.php"><button id="cancel">Employee Manage</button></a>
    <a href="foster.php"><button id="cancel">Foster Manage</button></a>
</body>
</html>
