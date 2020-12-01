<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'root';
$password = 'cmpsc431-mysql-root';
$host = 'localhost';
$dbname = '431W_Final';

function createAnimal()
{
	try{
		// Create entry in Animal table
		$species_id = $_POST["species_id"]
		$dob = $_POST["dob"]
		$sex = $_POST["sex"]
		$name = $_POST["name"]
		$availability = $_POST["availability"]
		$is_neutered = $_POST["is_neutered"]
		$shelter_id = $_POST["shelter_id"]

		$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$sql = 'INSERT INTO Animal (species_id, dob, sex, name, availability, is_neutered, in_shelter, shelter_id, provider_id) ';
		$sql = $sql . 'VALUES ("'.$species_id . '","' . $dob . '","' . $sex . '","' . $name . '","' . $availability . '","' . $is_neutered . '","' . 'True' . '",' . $shelter_id . ',' . 1 . ');';
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec($sql);

		// Get newly created Animal ID
		$sql = 'SELECT animal_id FROM Animal ORDER BY animal_id DESC LIMIT 1';
		$q = $pdo->query($sql);
    	$q->setFetchMode(PDO::FETCH_ASSOC);
    	$row = $q->fetch();
    	$animal_id = $row['animal_id'];

    	// Get location id based on shelter id
    	$sql = 'SELECT location_id FROM Shelter WHERE shelter_id=' . $shelter_id . ';';
    	$q = $pdo->query($sql);
    	$q->setFetchMode(PDO::FETCH_ASSOC);
    	$row = $q->fetch();
    	$location_id = $row['location_id'];

    	// Create entry in event log table
    	$sql = 'INSERT INTO Event_Log (animal_id, event_type, description, location_id) VALUES (' . $animal_id . ',"' . 'Description' . '","' . 'Added to database' . $_POST["description"] . '",' . $location_id . ');';
		$pdo->exec($sql);
		echo "New record created successfully";
		return True;
	}
	} catch(PDOException $e) {
	    die("Could not connect to the database $dbname :" . $e->getMessage());
		echo "Record creation failed";
		return False;
	}
}

function getAnimals()
{
	try{
		$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$sql = 'SELECT * FROM Animal;';
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$q = $pdo->query($sql);
    	$q->setFetchMode(PDO::FETCH_ASSOC);
		return $q;
	}
	} catch(PDOException $e) {
	    die("Could not connect to the database $dbname :" . $e->getMessage());
	    return NULL;
	}
}

function getSpecies()
{
	try{
		$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$sql = 'SELECT * FROM Species;';
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$q = $pdo->query($sql);
    	$q->setFetchMode(PDO::FETCH_ASSOC);
		return $q;
	}
	} catch(PDOException $e) {
	    die("Could not connect to the database $dbname :" . $e->getMessage());
	    return NULL;
	}
}

function getShelters()
{
	try{
		$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$sql = 'SELECT * FROM Shelter;';
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$q = $pdo->query($sql);
    	$q->setFetchMode(PDO::FETCH_ASSOC);
		return $q;
	}
	} catch(PDOException $e) {
	    die("Could not connect to the database $dbname :" . $e->getMessage());
	    return NULL;
	}

}

function

?>