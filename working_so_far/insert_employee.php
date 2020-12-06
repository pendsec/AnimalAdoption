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
			$get_title_id = 'SELECT job_id FROM job_description WHERE title = "' . $_POST["title"] . '";';
			try {
				$conn = getPDO();
				$shelter_id = $conn->query($get_shelter_id);
				$shelter_id->setFetchMode(PDO::FETCH_ASSOC);
				$shelter_id = $shelter_id->fetch();
				$title_id = $conn->query($get_title_id);
				$title_id->setFetchMode(PDO::FETCH_ASSOC);
				$title_id = $title_id->fetch();

				$add_employee = 'INSERT INTO employee (name, shelter_id, user_name, password, job_id)';
				$add_employee = $add_employee . 'VALUES ("' . $_POST["firstname"] . $_POST["lastname"] . '",' . $shelter_id['shelter_id'] . ', "' . $_POST['username'] .'" , "' . $_POST["password"] .'", ' . $title_id['job_id'] . ');';
				$conn->exec($add_employee);
				echo "Your information has been recorded!";
		?>
		<meta http-equiv = "refresh" content = "0; url = employees.php" />
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