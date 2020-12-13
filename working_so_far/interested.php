<!DOCTYPE html>
<?php include("functions.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current available animals for adoption</title>
	<link rel="stylesheet" href="http://cmpsc431-s3-g-8.vmhost.psu.edu/CSS/interested.css?v=<?php echo time(); ?>">
</head>
<body>
    <h1 style="font-size: 3em;">Animal details</h1>
    <div class="back"><a href="javascript:history.go(-1)" style="color: black;"><span></span>←Back</a></div> 
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
<table border=1 cellspacing=5 cellpadding=5 style="width: 100%; font-size: 1.5em;">
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
            <a href="../adoption.php?animal_id=<?php echo htmlspecialchars($row['animal_id']); ?>&amp;provider_type=Adopter"><button>Adopt!</button></a>
            <a href="../adoption.php?animal_id=<?php echo htmlspecialchars($row['animal_id']); ?>&amp;provider_type=Foster"><button>Foster!</button></a>
        <?php endif; ?>
        <a href="../medical_record.php/?animal_id=<?php echo htmlspecialchars($row['animal_id']); ?>"><button>Medical records</button></a>
        <a href="../history.php/?animal_id=<?php echo htmlspecialchars($row['animal_id']); ?>"><button>See location history</button></a>
    </div>
</div>
</body>
</html>
