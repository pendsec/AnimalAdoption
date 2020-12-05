<!DOCTYPE html>
<?php include("functions.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current available animals for adoption</title>
    <link rel="stylesheet" href="../CSS/interested.css">
</head>
<body>
                        
	<?php
		$Aid = $_GET["animal_id"];
		if ($_GET["availability"] == 1)
		{
			$q = describeAnimalUnadopted($Aid);
		}
		else
		{
			$q = describeAnimal($Aid);
		}
		$row = $q->fetch();
	?>
	<table border=1 cellspacing=5 cellpadding=5>
		<thead>
			<tr>
				<th>id</th>
				<th>Sex</th>
				<th>Name</th>
				<th>Species</th>
				<th>Breed</th>
				<th>age</th>
				<th>is_Neutered</th>
				<th>Shelter</th>
				<?php 
					if ($_GET["availability"] == 0)
					{
						echo "<th>Provider</th>";
						echo "<th>Provider Type</th>";
						echo "<th>Provider Location</th>";
					}
				?>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td><?php echo htmlspecialchars($row['animal_id']); ?></td>
					<td><?php echo htmlspecialchars($row['sex']) ?></td>
					<td><?php echo htmlspecialchars($row['animal_name']); ?></td>
					<td><?php echo htmlspecialchars($row['species']); ?></td>
					<td><?php echo htmlspecialchars($row['breed']); ?></td>
					<td><?php echo htmlspecialchars($row['age']); ?></td>
					<td><?php echo htmlspecialchars($row['is_Neutered']); ?></td>
					<td><?php echo htmlspecialchars($row['shelter_name']); ?></td>
					<?php
						if ($_GET["availability"] == 0)
						{
							echo "<td>".$row['provider_id']."</td>";
							echo "<td>".$row['provider_type']."</td>";
							echo "<td>".$row['provider_address'].", ".$row['provider_city']." ".$row['provider_zip_code']."</td>";
						}
					?>
				</tr>
		</tbody>
	</table>

	<div id="text">
		<p></p>
		<div id="btn">
			<?php if ($_GET["availability"] == 1): ?>
				<a href="../html/adoption.html"><button>Adopt!</button></a>
			<?php endif; ?>
			<a href="medical_record.php/?animal_id=<?php echo htmlspecialchars($row['animal_id']); ?>"><button>Medical records</button></a>
			<a href="history.php/?animal_id=<?php echo htmlspecialchars($row['animal_id']); ?>"><button>See history</button></a>
		</div>
	</div>

    <script src="../JS/myTools.js"></script>
    <script src="../JS/interested.js"></script>
</body>
</html>
