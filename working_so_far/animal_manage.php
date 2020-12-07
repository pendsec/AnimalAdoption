<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'root';
$password = 'cmpsc431-mysql-root';
$host = 'localhost';
$dbname = '431W_Final';
?>

<?php
include('functions.php');
$q = getAnimals();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal manage</title>
	<link rel="stylesheet" href="/CSS/manage.css?v=<?php echo time(); ?>">
</head>
<body>
    <h1>All Animals On Record</h1>
        <div id="navi">
            <a href="turn in.php"><button style="width: 80%;">Add an animal</button></a>
            <a href="employees.php"><button style="width: 80%;">Employee</button></a>
            <a href="foster.php"><button style="width: 80%;">Foster</button></a>
            <div id="back"><a href="dashboard.php" style="color: black;">Back<span></span></a></div>
        </div>
         <table border=1 cellspacing=5 cellpadding=5 style="width: 80%; font-size: 1.5em;">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Sex</th>
                    <th>Name</th>
                    <th>Species</th>
                    <th>Breed</th>
                    <th>Availability</th>
                    <th>Details</th>
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
    
    </body>
</html>
