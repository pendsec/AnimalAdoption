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
<html>
    <head>
        <title>Add providers</title>
    </head>
    <body>
		<p>
		<?php 
			$add_location = 'INSERT INTO location (address, city, state, zip_code)';
			$add_location = $location . 'VAULES ("'.$_POST["address"] . '" , "' . $_POST["city"] .'" , "' . $_POST["state"] .'", "' . $_POST["zip_code"] .'")';
			$get_location_id = 'SELECT location_id FROM location WHERE address = "'.$_POST["address"] . '" && city = "' . $_POST["city"] .'"';
			$get_sheler_id = 'SELECT shelter_id FROM shelter WHERE name = "'.$_POST["shelter_name"] . '"';

			$add_provider = 'INSERT INTO provider (provider_type, location_id, name, email, phone)';
			$add_provider = $add_provider . 'VAULES ("Adopter", "'.$get_location_id . '" , "' . $get_sheler_id .'" , "' . $_POST["firstname"] . $_POST["lastname"] .'", "' . $_POST["email"] .'", "' . $_POST["phone"] .'")';

			try {
				getPDO();
				$conn->exec($add_location);
				$conn->exec($get_location_id);
				$conn->exec($get_sheler_id);
				$conn->exec($add_provider);
				echo "Your information has been recorded!";
		?>
		<?php
			} catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
			$conn = null;
		?>
		</p>
    </body>
</div>
</html>
