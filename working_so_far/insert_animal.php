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
            $get_shelter_id = 'SELECT shelter_id FROM shelter WHERE name = "'.$_POST["shelter_name"] . '"';
			$q1 = constructQuery($get_shelter_id);
            $get_species_id = 'SELECT species_id FROM species WHERE species = "'.$_POST["pet_species"] . '" && breed = "' . $_POST["pet_breed"] .'"';
			$q2 = constructQuery($get_species_id);

			$add_animal = 'INSERT INTO animal (species_id, dob, sex, name, shelter_id)';

			try {
				
				$shelter_id =  $q1->fetch()["shelter_id"];
				$species_id =  $q2->fetch()["species_id"];
				$add_animal = $add_animal . 'VALUES ("'.$species_id . '" , "' . $_POST["pet_dob"] . '", ' . '"' . $_POST["pet_sex"] .'", "' . $_POST["pet_name"] .'",  "' . $shelter_id .'" )';
				//echo $add_animal;
				
				$q3 = constructQuery($add_animal);

				echo "<br>";
				echo "Your animal has been registered!";
		?>
		<?php
			} catch(PDOException $e) {
				echo $e->getMessage();
				//echo $sql . "<br>" . $e->getMessage();
			}
			$conn = null;
		?>
		</p>
    </body>
</div>
</html>
