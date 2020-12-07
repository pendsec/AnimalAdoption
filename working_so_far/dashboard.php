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
    <link rel="stylesheet" href="/CSS/adoption & fostering.css">
    <style>
        h1{
            font-size: 4em;
        }
        
        button{
            width: 50%;
            height: 80px;
            border-radius: 15px;
            margin: 30px;
            font-size: 3em;
            line-height: 150%;
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.6);
        }

        button:hover {
            background-color: var(--light-blue);
            cursor: pointer;
        }

    </style>
</head>
<body>
    <h1>Employee Dashboard</h1>
    <a href="animal_manage.php"><button>Animal Manage</button></a>
    <a href="employees.php"><button>Employee Manage</button></a>
    <a href="foster.php"><button>Foster Manage</button></a>
</body>
</html>
