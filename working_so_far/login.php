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
    <title>Employee Login</title>
    <link rel="stylesheet" href="http://cmpsc431-s3-g-8.vmhost.psu.edu/CSS/adoption & fostering.css?v=<?php echo time(); ?>">
</head>
<body>
    <div id="form">
        <form action="verify_login.php" method="POST">
            Username: <input type="text" style="width:50%;height:30px" name="username"><br>
            Password: <input type="password" style="width:50%;height:30px" name="password"><br>
            <input id="submit" type="submit">
        </form>
        <a href="javascript:history.go(-1)"><button id="cancel">Cancel</button></a>
    </div>
</body>
</html>
