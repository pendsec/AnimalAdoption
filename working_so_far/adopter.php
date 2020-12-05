<?php
include('functions.php');
$q = getAnimals();
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, user-scalable=no">
    <title>Current available animals for adoption</title>
    <link rel="stylesheet" href="../CSS/adopter & foster.css">
</head>
<body>
<h1>All Animals On Record</h1>
     <table border=1 cellspacing=5 cellpadding=5>
        <thead>
            <tr>
                <th>id</th>
                <th>Sex</th>
                <th>Name</th>
                <th>Species</th>
                <th>Breed</th>
                <th>availability</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $q->fetch()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['animal_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['sex']) ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['species']); ?></td>
                    <td><?php echo htmlspecialchars($row['breed']); ?></td>
                    <td><?php echo htmlspecialchars($row['availability']); ?></td>
					<td>
						<a href="interested.php/?animal_id=<?php echo htmlspecialchars($row['animal_id']); ?>&amp;availability=<?php echo htmlspecialchars($row['availability']); ?>">More Information</a>
					</td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <script src="../JS/myTools.js"></script>
    <script src="../JS/adopter & foster.js"></script>
</body>
</html>
