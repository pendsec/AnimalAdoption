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
        <title>Add Employee</title>
    </head>
    <body>
		<p>
		<?php 
			$get_shelter_id = 'SELECT shelter_id FROM shelter WHERE name = "'.$_POST["shelter"] . '"';
			$get_title_id = 'SELECT title_id FROM title WHERE name = "' . $_POST["title"] . '";';
			try {
				$conn = getPDO();
				$shelter_id = $conn->query($get_shelter_id);
				$shelter_id->setFetchMode(PDO::FETCH_ASSOC);
				$title_id = $conn->query($get_title_id);
				$title_id->setFetchMode(PDO::FETCH_ASSOC);

				$add_employee = 'INSERT INTO employee (name, shelter_id, user_name, password, job_id)';
				$add_employee = $add_provider . 'VAULES ('.$shelter_id['id'] . ', "' . $_POST['username'] .'" , "' . $_POST["password"] .'", ' . $title_id['id'] . ');';
				$conn->exec($add_employee);
				echo "Your information has been recorded!";
		?>
		<?php
			} catch(PDOException $e) {
				echo $add_employee . "<br>" . $e->getMessage();
			}
			$conn = null;
		?>
		</p>
    </body>
</div>
</html>