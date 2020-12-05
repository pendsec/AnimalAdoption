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
        <title>Login</title>
    </head>
    <body>
		<p>
		<?php 
			$get_employee = 'SELECT id FROM employee WHERE user_name = "'.$_POST["username"] . '" AND password = "' . $_POST["password"] . '";';
			try {
				$conn = getPDO();
				$employee_id = $conn->query($get_employee);
				if($employee_id->num_rows == 0)
				{
					echo "Login Failed";
				}
				else
				{
					echo "Login Succeeded"
				}
			} catch(PDOException $e) {
				echo $get_employee . "<br>" . $e->getMessage();
			}
			$conn = null;
		?>
		</p>
    </body>
</div>
</html>