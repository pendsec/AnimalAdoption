<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="../CSS/history.css">
</head>
<body>
    <div id="container">
        <div id="title">History records for </div>
        <div id="content">
            <div class="back"><a href="javascript:history.go(-1)" style="color: black;"><span></span>Back</a></div>
            <p>
            <?php
            include("../functions.php");
            function getLocationHistory($animalID){
                $sql = "SELECT date, address, city, state, zip_code FROM event_log e, location l WHERE (event_type='description' or event_type='adoption' or event_type='fostered') and e.location_id=l.location_id and animal_id=" . $animalID . ";";
                return constructQuery($sql);
            }
            $q = getLocationHistory(4);
            while ($row = $q->fetch()):
	            echo implode(" | ", $row)."<br>";
            endwhile;
            ?>
            </p>
        </div>
    </div>
    <script src="../JS/myTools.js"></script>
    <script src="../JS/history.js"></script>
</body>
</html>