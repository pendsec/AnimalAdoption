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
    <title>Animal manage</title>
    <link rel="stylesheet" href="/CSS/manage.css">
</head>
<body>
    <div id="main">
        <h2>Current Animals</h2>
        <div id="detail">
            <p>
            <?php describeAnimalAll();?>
            </p>
        </div>
    </div>
    <div id="navi">
        <a href="../html/turn in.html"><button>Add an animal</button></a>
        <a href="../html/employee manage.html"><button>Current employees</button></a>
        <a href="../html/foster manage.html"><button>Current fosters</button></a>
        <div id="back"><a href="../html/shelter_dashboard.html" style="color: black;">Back<span></span></a></div>
        <img src="../icons/dog-house.svg">
    </div>
</body>
</html>