<?php
include_once("../db.php");
include_once("../province.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'name' => $_POST['name'],
        // Other town fields if needed
    ];

    // Instantiate the Database and TownCity classes
    $database = new Database();
    $province = new Province($database);

    // Create the town record
    if ($province->create($data)) {
        echo "Town added successfully.";
    } else {
        echo "Failed to add the town.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

    <title>Add Province</title>
</head>
<body>
    <!-- Include the header and navbar -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
        <h1>Add Province</h1>
        <form action="" method="post" class="centered-form">
            <label for="province_name">Province Name:</label>
            <input type="text" name="name" id="province_name" required>

            <!-- Other town fields if needed -->

            <input type="submit" value="Province Name">
        </form>
    </div>

    <?php include('../templates/footer.html'); ?>
</body>
</html>
