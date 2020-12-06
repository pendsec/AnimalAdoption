<!DOCTYPE html>
<?php include("functions.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Employees</title>
    <link rel="stylesheet" href="../CSS/interested.css">
</head>
<body>              
	<?php
		$conn = getPDO();
		$sql = 'SELECT E.employee_id AS id, E.name AS name, E.user_name AS username, S.name as shelter_name, T.title AS title, E.is_active FROM employee E, shelter S, job_description T WHERE E.shelter_id=S.shelter_id AND E.job_id = T.job_id AND E.is_active=True;';
		$q = $conn->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
	?>
	<h1> Employee Management Page </h1><br>

	<a href="create_employee.php"><button id="cancel">Create New Employee</button></a>
	<table border=1 cellspacing=5 cellpadding=5>
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

    <script src="../JS/myTools.js"></script>
    <script src="../JS/interested.js"></script>
</body>
</html>
