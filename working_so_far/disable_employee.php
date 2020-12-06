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
        <title>Remove Employee</title>
    </head>
    <body>
		<p>
		<?php
			$fire_employee = 'UPDATE employee SET is_active=False WHERE employee_id = '. $_POST["id"] . ';';
			try {
				$conn = getPDO();
				$conn->exec($fire_employee);
				echo "The employee has been removed!";

				$sql = 'SELECT * FROM employee WHERE employee_id = ' . $_POST["id"] . ';';
				$q = $conn->query($sql);
				$q->setFetchMode(PDO::FETCH_ASSOC);
				$value =  $q->fetch();
		?>
		<meta http-equiv = "refresh" content = "0; url = employees.php" />
		<?php
			} catch(PDOException $e) {
				echo $fire_employee . "<br>" . $e->getMessage();
			}
			$conn = null;
		?>
		</p>
    </body>
</div>
</html>