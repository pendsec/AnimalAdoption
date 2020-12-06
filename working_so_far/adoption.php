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
    <title>Adoption Form</title>
    <link rel="stylesheet" href="/CSS/adoption & fostering.css">
</head>
<body>
    <div id="form">
		<?php $ptype = $_GET["provider_type"] ?>
        <form action="insert_provider.php" method="POST">
            First name: <input type="text" style="width:50%;;height:30px" name="firstname"><br>
            Last name: <input type="text" style="width:50%;height:30px" name="lastname"><br>
            Phone number: <input type="text" style="width:50%;height:30px" name="phone"><br>
            Email: <input type="email" style="width:50%;height:30px" name="email"><br>
            Address: <input type="text" style="width:50%;height:30px" name="address"><br>
            City: <input type="text" style="width:50%;height:30px" name="city"><br>
            State: <input type="text" style="width:50%;height:30px" name="state"><br>
            Zipcode: <input type="text" style="width:50%;height:30px" name="zip_code"><br>
            Shelter's name: <input type="text" style="width:50%;height:30px" name="shelter_name"><br>
            Pet's name: <input type="text" style="width:50%;height:30px" name="pet_name"><br>
            Provider Type: <input type="text" style="width:50%;height:30px" value=<?php echo $ptype ?> name="provider_type"><br>
            <input id="submit" type="submit">
        </form>
        <a href="javascript:history.go(-1)"><button id="cancel">Cancel</button></a>
    </div>
    
    <div id="thanks">
        <p>
            Thank you for your interest! Please leave your information, we will contact you soon!
        </p>
    </div>
</body>
</html>
