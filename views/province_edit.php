<?php
include_once("../db.php");
include_once("../province.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch town data by ID from the database
    $db = new Database();
    $province = new Province($db);
    $provincedata = $province->read($id); // Implement the read method in the TownCity class

    if (!$provincedata) {
        echo "Town not found.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'id' => $_POST['id'],
        'name' => $_POST['name']
    ];

    $db = new Database();
    $province = new Province($db);

    // Call the update method to update the town data
    if ($province->update($id, $data)) {
        echo "Record updated successfully.";
    } else {
        echo "Failed to update the record.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Edit Town</title>
</head>
<body>
    <!-- Include the header and navbar -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
    <h2>Edit Town Name</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $provincedata['id']; ?>">
        
        <label for="province">Town Name:</label>
        <input type="text" name="name" id="province" value="<?php echo $provincedata['name']; ?>">
            
        <input type="submit" value="Update">
    </form>
    </div>
    <?php include('../templates/footer.html'); ?>
</body>
</html>
