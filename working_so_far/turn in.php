<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'root';
$password = 'cmpsc431-mysql-root';
$host = 'localhost';
$dbname = '431W_Final';
?>

<?php include ("functions.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turn in Form</title>
    <link rel="stylesheet" href="/CSS/turn in.css">
</head>
<body>
    <div id="form">
        <form action="insert_animal.php" method="POST">
            <p>
                Animal's name: <input type="text" style="width:10%;height:30px" name="pet_name"><br>
                Species of the animal: <input type="text" style="width:20%;height:30px" name="pet_species">
                Breed of the animal: <input type="text" style="width:20%;height:30px" name="pet_breed"><br>
                DOB of the animal: <input type="text" style="width:10%;height:30px" name="pet_dob">
                Sex of the animal: <input type="text" style="width:10%;height:30px" name="pet_sex"><br>
                Which shelter you want to turn it in: <input type="text" style="width:30%;height:30px" name="shelter_name"><br>
            </p>
            <input id="submit" type="submit">
        </form>
        <a href="javascript:history.go(-1)"><button id="cancel">Cancel</button></a>
    </div>
</body>
</html>
