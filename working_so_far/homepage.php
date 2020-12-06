<!DOCTYPE html>
<?php include("functions.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../CSS/homepage.css?v=<?php echo time(); ?>">
    <title>Home page</title>
</head>
<body>
    <div id="title">Find Your Fluffy Friend Today!~</div>
    <div id="pic"></div>
    <div id="navi">
        <div class="option"><a href="adopter.php"><button id="adopt">I want to adopt/foster an animal</button></a></div>
        <div class="option"><a href="turn in.php"><button id="turn-in">Turn in an animal</button></a></div>
        <div id="shelter_log_in"><a href="login.php">Shelters Log In</a></div>
    </div>
</body>
</html>
