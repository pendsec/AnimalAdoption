<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'root';
$password = 'cmpsc431-mysql-root';
$host = 'localhost';
$dbname = '431W_Final';

// this code is repeated each time we do a query. I pulled it out into a function
function getPDO()
{
	global $username, $password, $host, $dbname;
	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $pdo;
}

// this code is repeated each time we do a query. I pulled it out into a function
function constructQuery($queryString)
{
	try{
		$pdo = getPDO();
		$q = $pdo->query($queryString);
		$q->setFetchMode(PDO::FETCH_ASSOC);
		return $q;
	}
	catch(PDOException $e) {
	    die("Could not connect to the database $dbname :" . $e->getMessage());
	    return NULL;
	}
}

function createAnimal()
{
	try{
		// Create entry in Animal table
		$species_id = $_POST["species_id"];
		$dob = $_POST["dob"];
		$sex = $_POST["sex"];
		$name = $_POST["name"];
		$availability = $_POST["availability"];
		$is_neutered = $_POST["is_neutered"];
		$shelter_id = $_POST["shelter_id"];

		$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$sql = 'INSERT INTO Animal (species_id, dob, sex, name, availability, is_neutered, in_shelter, shelter_id, provider_id) ';
		$sql = $sql . 'VALUES ("'.$species_id . '","' . $dob . '","' . $sex . '","' . $name . '","' . $availability . '","' . $is_neutered . '","' . 'True' . '",' . $shelter_id . ',' . 1 . ');';
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec($sql);

		// Get newly created Animal ID
		$sql = 'SELECT animal_id FROM animal ORDER BY animal_id DESC LIMIT 1';
		$q = $pdo->query($sql);
    	$q->setFetchMode(PDO::FETCH_ASSOC);
    	$row = $q->fetch();
    	$animal_id = $row['animal_id'];

    	// Get location id based on shelter id
    	$sql = 'SELECT location_id FROM shelter WHERE shelter_id=' . $shelter_id . ';';
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
	catch(PDOException $e) {
	    die("Could not connect to the database $dbname :" . $e->getMessage());
		echo "Record creation failed";
		return False;
	}
}

function getAnimals()
{
	$sql = 'SELECT * FROM animal;';
	return constructQuery($sql);
}

function getSpecies()
{
	$sql = 'SELECT * FROM species;';
	return constructQuery($sql);
}

function getShelters()
{
	$sql = 'SELECT * FROM shelter;';
	return constructQuery($sql);
}

// function 8
function describeAnimal()
{
	$sql = 'SELECT A.animal_id, Sp.species, Sp.breed, TIMESTAMPDIFF(YEAR, A.DOB, NOW()), A.sex, A.name as animal_name, A.availability, A.is_Neutered, L1.address as provider_address, L1.city as provider_city, L1.state as provider_state, L1.zip_code as provider_zip_code, P.provider_type, P.provider_id, L2.address as shelter_address, L2.city as shelter_city, L2.state as shelter_state, L2.zip_code as shelter_zip_code, S.name as shelter_name, S.shelter_id FROM animal A, provider P, location L1, location L2, shelter S, species Sp WHERE A.species_id=Sp.species_id AND A.provider_id=P.provider_id AND A.shelter_id=S.shelter_id AND L1.location_id=P.location_id AND L2.location_id=S.location_id ORDER BY A.animal_id;';
	return constructQuery($sql);
}
?>
