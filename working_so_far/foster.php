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
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php 

            $q1 = getOccupiedFoster();
            while ($row = $q1->fetch()): ?>
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
        <a href="adoption.php?provider_type=Foster"<button>Add a foster</button>
        <a href="animal_manage.php"><button>Current animals</button></a>
        <a href="employees.php"><button>Current employees</button></a>
        <div id="back"><a href="dashboard.php" style="color: black;">Back<span></span></a></div>
        <img src="../icons/dog-house.svg">
    </div>

    <script src="../JS/myTools.js"></script>
    <script src="../JS/foster manage.js"></script>
</body>
</html>
