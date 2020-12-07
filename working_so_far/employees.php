<!DOCTYPE html>
<?php include("functions.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Employees</title>
    <link rel="stylesheet" href="/CSS/manage.css?v=<?php echo time(); ?>">
</head>
<body>              
	<?php
		$conn = getPDO();
		$sql = 'SELECT E.employee_id AS id, E.name AS name, E.user_name AS username, S.name as shelter_name, T.title AS title, E.is_active FROM employee E, shelter S, job_description T WHERE E.shelter_id=S.shelter_id AND E.job_id = T.job_id AND E.is_active=True;';
		$q = $conn->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
	?>
	<h1> Employee Management Page </h1><br>
	<div id="navi">
			<a href="create_employee.php"><button style="width: 80%;">Create New Employee</button></a>
            <a href="animal_manage.php"><button style="width: 80%;">Animals</button></a>
            <a href="foster.php"><button style="width: 80%;">Foster</button></a>
            <div id="back"><a href="dashboard.php" style="color: black;">Back</a></div>
        </div>
	
	<table border=1 cellspacing=5 cellpadding=5 style="width: 80%; font-size: 1.5em;">
		<thead>
			<tr>
				<th>Name</th>
				<th>Username</th>
				<th>Shelter</th>
				<th>Title</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = $q->fetch()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']) ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['shelter_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo '<form action="disable_employee.php" method="post"><input type="submit" value="DELETE"><input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '"></form>'; ?></td>
                </tr>
            <?php endwhile; ?>
		</tbody>
	</table>
</body>
</html>
