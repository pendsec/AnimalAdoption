<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical records</title>
    <link rel="stylesheet" href="../CSS/medical_record.css">
</head>
<body>
    <div id="container">
        <div id="title">Medical records for </div>
        <div id="content">
            <div class="back"><a href="javascript:history.go(-1)" style="color: black;"><span></span>Back</a></div>
            <p>
            <?php
            include("functions.php");
            function getMedicalHistory(){
                $sql = "SELECT date, description FROM event_log WHERE event_type='medical' AND animal_id=" . $_GET['animalID'] . ";";
                return constructQuery($sql);
            }
            function getLocationHistory(){
                $sql = "SELECT date, address, city, state, zip_code FROM event_log e, location l WHERE (event_type='description' or event_type='adoption' or event_type='fostered') and e.location_id=l.location_id and animal_id=" . $_GET['animalID'] . ";";
                return constructQuery($sql);
            }
            $q = getMedicalHistory();
            while ($row = $q->fetch()):
	            echo implode(" | ", $row)."<br>";
            endwhile;
            ?>
            </p>
        </div>
    </div>
    <script src="../JS/myTools.js"></script>
    <script src="../JS/medical_record.js"></script>
</body>
</html>