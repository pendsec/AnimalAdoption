<!DOCTYPE html>

<?php
include('functions.php');
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foster Homes</title>
    <link rel="stylesheet" href="/CSS/manage.css?v=<?php echo time(); ?>">
</head>
<body>
    <div id="main">
        <h1>Current registered foster families</h1>
        <div id="navi">
            <a href="adoption.php?provider_type=Foster"><button style="width: 80%;">Add a foster</button></a>
            <a href="animal_manage.php"><button style="width: 80%;">Animals</button></a>
            <a href="employees.php"><button style="width: 80%;">Employees</button></a>
            <div id="back"><a href="dashboard.php" style="color: black;">Back</a></div>
        </div>
		<table border=1 cellspacing=5 cellpadding=5 style="width: 80%; font-size: 1.5em;">
			<thead>
				<tr>
					<th>Name:</th>
					<th>Phone Number:</th>
					<th>Email:</th>
					<th>Address:</th>
					<th>Currently Fostering:</th>
				</tr>
			</thead>
			<tbody>
				<?php 

            $q = getOccupiedFoster();
            while ($row = $q->fetch()): ?>
					  <tr>
							<td><?php echo htmlspecialchars($row['name']); ?></td>
							<td><?php echo htmlspecialchars($row['phone']); ?></td>
							<td><?php echo htmlspecialchars($row['email']); ?></td>
							<td><?php echo htmlspecialchars($row['address']). ", ".htmlspecialchars($row['city']). ", ".htmlspecialchars($row['zip_code']); ?></td>
						</tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
