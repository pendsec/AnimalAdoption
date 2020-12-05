<!DOCTYPE html>

<?php
include('functions.php');
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foster Homes</title>
    <link rel="stylesheet" href="../CSS/manage.css">
</head>
<body>
    <div id="main">
        <h2>Current registered foster families</h2>
		<table border=1 cellspacing=5 cellpadding=5>
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
					
        <div id="detail">
            <p></p>
        </div>
    </div>
    <div id="navi">
        <button>Add a foster</button>
        <button>Remove a foster</button>
        <a href="../html/anima_manage.html"><button>Current animals</button></a>
        <a href="../html/employee manage.html"><button>Current employees</button></a>
        <div id="back"><a href="../html/shelter_dashboard.html" style="color: black;">Back<span></span></a></div>
        <img src="../icons/dog-house.svg">
    </div>

    <script src="../JS/myTools.js"></script>
    <script src="../JS/foster manage.js"></script>
</body>
</html>
