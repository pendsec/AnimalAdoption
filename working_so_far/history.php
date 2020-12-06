<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="../../CSS/history.css?v=<?php echo time(); ?>">
</head>
<body>
    <div id="container">
        <div id="title">Location history records</div>
        <div id="content">
            <div class="back"><a href="javascript:history.go(-1)" style="color: black;"><span></span>Back</a></div>
            <p>
                <?php
                include("functions.php");
                function getLocationHistory($animalID){
                    $sql = "SELECT date, address, city, state, zip_code FROM event_log e, location l WHERE (event_type='description' or event_type='adoption' or event_type='fostered') and e.location_id=l.location_id and animal_id=" . $animalID . " ORDER BY date DESC;";
                    return constructQuery($sql);
                }
                $q = getLocationHistory($_GET["animal_id"]);
                ?>
                <table border=1 cellspacing=5 cellpadding=5>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Zip Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $q->fetch()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['date']) ?></td>
                                <td><?php echo htmlspecialchars($row['address']); ?></td>
                                <td><?php echo htmlspecialchars($row['city']); ?></td>
                                <td><?php echo htmlspecialchars($row['state']); ?></td>
                                <td><?php echo htmlspecialchars($row['zip_code']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </p>
        </div>
    </div>
    <script src="../JS/myTools.js"></script>
    <script src="../JS/history.js"></script>
</body>
</html>
