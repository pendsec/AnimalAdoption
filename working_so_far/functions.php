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
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $conn;
}

// this code is repeated each time we do a query. I pulled it out into a function
function constructQuery($queryString)
{
	global $username, $password, $host, $dbname;
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

// function 1
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

		// TODO: Data validation

		$pdo = getPDO();
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
	$sql = 'SELECT * FROM animal A, species S WHERE A.species_id=S.species_id;';
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

function updateAnimal()
{
	try{
		$animal_id = $_POST['animal_id'];
		$shelter_id = $_POST['shelter_id'];
		$provider_id = $_POST['provider_id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone_number = $_POST['phone_number'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip_code = $_POST['zip_code'];

		// TODO: Data validation

		// Update Animal table
		$pdo = getPDO();
		$sql = 'UPDATE Animal SET availability=' . '"False"' . ',' . 'provider_id="' . $provider_id . '" ' . 'in_shelter=' . '"False"' . ' WHERE animal_id=' . $animal_id . ';';
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec($sql);

		// Create new Provider entry
		$sql = 'INSERT INTO Provider (provider_id, provider_type, location_id, shelter_id, name, email, phone_number) VALUES (' . $provider_id . ',"' . 'Adoption' . '",' . $location_id . ',' . $shelter_id . ',"' . $name . '","' . $email . '","' . $phone_number . '");';
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec($sql);

    	// Create entry in event log table
    	$sql = 'INSERT INTO Event_Log (animal_id, event_type, description, location_id) VALUES (' . $animal_id . ',"' . 'Adoption' . '","' . 'Adopted' . '",' . $location_id . ');';
		$pdo->exec($sql);
		echo "New record created successfully";
		return True;


	}catch(PDOException $e)
	{
	    die("Could not connect to the database $dbname :" . $e->getMessage());
	    return NULL;
	}
}

function requestFoster()
{
	try{
		$animal_id = $_POST['animal_id'];
		$shelter_id = $_POST['shelter_id'];
		$provider_id = $_POST['provider_id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone_number = $_POST['phone_number'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip_code = $_POST['zip_code'];

		// TODO: Data validation

		// Update Animal table
		$pdo = getPDO();
		$sql = 'UPDATE Animal SET availability=' . '"False"' . ',' . 'provider_id="' . $provider_id . '" ' . 'in_shelter=' . '"False"' . ' WHERE animal_id=' . $animal_id . ';';
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec($sql);

		// Create new Provider entry
		$sql = 'INSERT INTO Provider (provider_id, provider_type, location_id, shelter_id, name, email, phone_number) VALUES (' . $provider_id . ',"' . 'Foster Family' . '",' . $location_id . ',' . $shelter_id . ',"' . $name . '","' . $email . '","' . $phone_number . '");';
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec($sql);

    	// Create entry in event log table
    	$sql = 'INSERT INTO Event_Log (animal_id, event_type, description, location_id) VALUES (' . $animal_id . ',"' . 'Fostered' . '","' . 'Fostered' . '",' . $location_id . ');';
		$pdo->exec($sql);
		echo "New record created successfully";
		return True;


	}catch(PDOException $e)
	{
	    die("Could not connect to the database $dbname :" . $e->getMessage());
	    return NULL;
	}
}

function getAnimalHistory()
{
	try{
		$animal_id = $_POST['animal_id'];

		// Check if date filter is set
		if (!(isset($_POST['date_from']) && isset($_POST['date_to'])))
		{
			// TODO: Data validation

			// Get animal location history
			$pdo = getPDO();
			$sql = ''; // TODO
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$q = $pdo->query($sql);
	    	$q->setFetchMode(PDO::FETCH_ASSOC);
			return $q;
		}

		// Filter events by date
		$date_from = $_POST['date_from'];
		$date_to = $_POST['date_to'];

		// Get animal location history by date
		$pdo = getPDO();
		$sql = ''; // TODO
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$q = $pdo->query($sql);
    	$q->setFetchMode(PDO::FETCH_ASSOC);
		return $q;
	} catch(PDOException $e)
	{
	    die("Could not connect to the database $dbname :" . $e->getMessage());
	    return NULL;
	}
}

function getAnimalMedicalHistory()
{
	try{
		$animal_id = $_POST['animal_id'];

		// Check if date filter is set
		if (!(isset($_POST['date_from']) && isset($_POST['date_to'])))
		{
			// TODO: Data validation

			// Get animal medical history
			$pdo = getPDO();
			$sql = ''; // TODO
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$q = $pdo->query($sql);
	    	$q->setFetchMode(PDO::FETCH_ASSOC);
			return $q;
		}

		// TODO: Data validation

		// Filter by dates
		$date_from = $_POST['date_from'];
		$date_to = $_POST['date_to'];

		// Get animal medical history by date
		$pdo = getPDO();
		$sql = ''; // TODO
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$q = $pdo->query($sql);
    	$q->setFetchMode(PDO::FETCH_ASSOC);
		return $q;
	} catch(PDOException $e)
	{
    	die("Could not connect to the database $dbname :" . $e->getMessage());
	    return NULL;
	}
}

// function 8
function describeAnimal($animal_id)
{
	$sql = "SELECT A.animal_id, Sp.species, Sp.breed, TIMESTAMPDIFF(YEAR, A.DOB, NOW()) as age, A.sex, A.name as animal_name, A.availability, A.is_Neutered, L1.address as provider_address, L1.city as provider_city, L1.state as provider_state, L1.zip_code as provider_zip_code, P.provider_type, P.provider_id, L2.address as shelter_address, L2.city as shelter_city, L2.state as shelter_state, L2.zip_code as shelter_zip_code, S.name as shelter_name, S.shelter_id
		FROM animal A, provider P, location L1, location L2, shelter S, species Sp
 WHERE A.species_id=Sp.species_id AND A.provider_id=P.provider_id AND A.shelter_id=S.shelter_id AND L1.location_id=P.location_id AND L2.location_id=S.location_id AND A.animal_id=$animal_id
 ORDER BY A.animal_id;";
	return constructQuery($sql);
}

// function 8
function describeAnimalAll()
{
	$sql = "SELECT A.animal_id, Sp.species, Sp.breed, TIMESTAMPDIFF(YEAR, A.DOB, NOW()) as age, A.sex, A.name as animal_name, A.availability, A.is_Neutered, L1.address as provider_address, L1.city as provider_city, L1.state as provider_state, L1.zip_code as provider_zip_code, P.provider_type, P.provider_id, L2.address as shelter_address, L2.city as shelter_city, L2.state as shelter_state, L2.zip_code as shelter_zip_code, S.name as shelter_name, S.shelter_id
		FROM animal A, provider P, location L1, location L2, shelter S, species Sp
 WHERE A.species_id=Sp.species_id AND A.provider_id=P.provider_id AND A.shelter_id=S.shelter_id AND L1.location_id=P.location_id AND L2.location_id=S.location_id
 ORDER BY A.animal_id;";
	return constructQuery($sql);
}

function describeAnimalUnadopted($animal_id)
{
	$sql = "SELECT A.animal_id, Sp.species, Sp.breed, TIMESTAMPDIFF(YEAR, A.DOB, NOW()) as age, A.sex, A.name as animal_name, A.availability, A.is_Neutered, L2.address as shelter_address, L2.city as shelter_city, L2.state as shelter_state, L2.zip_code as shelter_zip_code, S.name as shelter_name, S.shelter_id
		FROM animal A, location L2, shelter S, species Sp
 WHERE A.species_id=Sp.species_id AND A.provider_id IS NULL AND A.shelter_id=S.shelter_id AND L2.location_id=S.location_id AND A.animal_id=$animal_id
 ORDER BY A.animal_id;";
	return constructQuery($sql);
}

function describeAnimalUnadoptedAll()
{
	$sql = "SELECT A.animal_id, Sp.species, Sp.breed, TIMESTAMPDIFF(YEAR, A.DOB, NOW()) as age, A.sex, A.name as animal_name, A.availability, A.is_Neutered, L2.address as shelter_address, L2.city as shelter_city, L2.state as shelter_state, L2.zip_code as shelter_zip_code, S.name as shelter_name, S.shelter_id
		FROM animal A, location L2, shelter S, species Sp
 WHERE A.species_id=Sp.species_id AND A.provider_id IS NULL AND A.shelter_id=S.shelter_id AND L2.location_id=S.location_id
 ORDER BY A.animal_id;";
	return constructQuery($sql);
}

function getTitles()
{
	$sql = 'SELECT * FROM title;';
	return constructQuery($sql);
}

?>

