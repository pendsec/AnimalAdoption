<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'root';
$password = 'cmpsc431-mysql-root';
$host = 'localhost';
$dbname = '431W_Final';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical records</title>
    <link rel="stylesheet" href="../../CSS/medical_record.css?v=<?php echo time(); ?>">
</head>
<body>
    <div id="container">
        <div id="title">Medical records</div>
        <div id="content">
            <div class="back"><a href="javascript:history.go(-1)" style="color: black;"><span></span>Back</a></div>
            <p>
                <?php
                include("functions.php");
                function getMedicalHistory($animalID){
                    $sql = "SELECT date, description FROM event_log WHERE event_type='medical' AND animal_id=" . $animalID . " ORDER BY date DESC;";
                    return constructQuery($sql);
                }
                $q = getMedicalHistory($_GET["animal_id"]);
                ?>
                <table border=1 cellspacing=5 cellpadding=5 style="width: 100%; font-size: 1.5em;">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $q->fetch()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['date']) ?></td>
                                <td><?php echo htmlspecialchars($row['description']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </p>
        </div>
    </div>
    <script src="../JS/myTools.js"></script>
    <script src="../JS/medical_record.js"></script>
</body>
</html>
