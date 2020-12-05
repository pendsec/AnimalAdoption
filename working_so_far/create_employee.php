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
$shelters = getShelters();
$titles = getTitles();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration Form</title>
    <link rel="stylesheet" href="/CSS/adoption & fostering.css">
</head>
<body>
    <div id="form">
        <form action="insert_employee.php" method="POST">
            First name: <input type="text" style="width:50%;;height:30px" name="firstname"><br>
            Last name: <input type="text" style="width:50%;height:30px" name="lastname"><br>
            <label for="shelters">Shelter:</label><br>
            <select name="shelters" id="shelters" multiple>
                <?php while ($row = $shelters->fetch()): ?>
                    <option><?php echo htmlspecialchars($row['name']) ?></option><br>
                <?php endwhile; ?>
            </select>
            Username: <input type="email" style="width:50%;height:30px" name="username"><br>
            Password: <input type="text" style="width:50%;height:30px" name="password"><br>
            <label for="titles">Title:</label><br>
            <select name="titles" id="titles" multiple>
                <?php while ($row = $titles->fetch()): ?>
                    <option><?php echo htmlspecialchars($row['title']) ?></option><br>
                <?php endwhile; ?>
            </select>            
            <input id="submit" type="submit">
        </form>
        <a href="javascript:history.go(-1)"><button id="cancel">Cancel</button></a>
    </div>
</body>
</html>
