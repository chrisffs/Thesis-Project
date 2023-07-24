<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Success</h1>
    <?php 
    echo  "<p>ID: " . $_SESSION['ID'] . "</p>";
    echo  "<p>ID Number: " . $_SESSION['id_number'] . "</p>";
    echo  "<p>TUPV-ID: " . $_SESSION['tupv_id']. "</p>";
    echo  "<p>Username: " . $_SESSION['username']. "</p>";
    echo  "<p>Password: " . $_SESSION['password']. "</p>";
    echo  "<p>Full Name: " . $_SESSION['full_name']. "</p>";
    echo  "<p>Department: " . $_SESSION['department']. "</p>";
    echo  "<p>Role: " . $_SESSION['type']. "</p>";
    ?>
</body>
</html>