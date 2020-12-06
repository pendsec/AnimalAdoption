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
			$add_location = $add_location . 'VALUES ("'.$_POST["address"] . '" , "' . $_POST["city"] .'" , "' . $_POST["state"] .'", "' . $_POST["zip_code"] .'");';
			$q1 = constructQuery($add_location);

			$get_location_id = 'SELECT location_id FROM location WHERE address = "'.$_POST["address"] . '" & city = "' . $_POST["city"] .'"';
			$q2 = constructQuery($get_location_id);

			$get_sheler_id = 'SELECT shelter_id FROM shelter WHERE name = "'.$_POST["shelter_name"] . '"';
			$q3 = constructQuery($get_sheler_id);

			
			try {
				
				$location_id =  $q2->fetch()["location_id"];
				$sheler_id =  $q3->fetch()["shelter_id"];
				
				$add_provider = 'INSERT INTO provider (provider_type, location_id, shelter_id, name, email, phone)';
				$add_provider = $add_provider . 'VALUES ("'.$_POST["provider_type"].'", "'.$location_id . '" , "' . $sheler_id .'" , "' . $_POST["firstname"] . ' ' . $_POST["lastname"] .'", "' . $_POST["email"] .'", "' . $_POST["phone"] .'");';

				$q4 = constructQuery($add_provider);

				echo "<br>";
				echo "Your information has been recorded!";
		?>
		<?php
			} catch(PDOException $e) {
				echo $e->getMessage();
				// echo $sql . "<br>" . $e->getMessage();
			}
			$conn = null;
		?>
		</p>
    </body>
</div>
</html>
