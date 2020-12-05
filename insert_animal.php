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
        <title>Add animals</title>
    </head>
    <body>
		<p>
        <?php 
            $get_sheler_id = 'SELECT shelter_id FROM shelter WHERE name = "'.$_POST["shelter_name"] . '"';
            $get_species_id = 'SELECT species_id FROM species WHERE species = "'.$_POST["pet_species"] . '" && breed = "' . $_POST["pet_breed"] .'"';

			$add_animal = 'INSERT INTO animal (species_id, dob, sex, name, shelter_id)';
			$add_animal = $add_animal . 'VAULES ("'.$get_species_id . '" , "' . $_POST["pet_dob"] . $_POST["pet_sex"] .'", "' . $_POST["pet_name"] .'",  "' . $get_sheler_id .'" )';

			try {
				getPDO();
				$conn->exec($get_sheler_id);
				$conn->exec($get_species_id);
				$conn->exec($add_animal);
				echo "Your animal has been registered!";
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
