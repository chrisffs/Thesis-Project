<?php
include '../db/conn.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../src/css/bootstrap.min.css">
    <script defer src="../src/js/bootstrap.bundle.min.js"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
</head>
<body>
<div class="container">
<form action="questionbank.php" method="post" enctype="multipart/form-data">
        <?php 
        if(isset($_SESSION['message'])) :
        ?>  
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php 
            unset($_SESSION['message']);
            endif;
        ?>
    <div class="row">
        <div class="col">
            <a class="btn btn-success" href="../db/files/questionbank_excel_template.xlsx" role="button" download>Download Excel File
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="file" class="form-control" id="excel" name="excel">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" name="submit_excel" class="btn btn-danger">Submit Questions</button>
        </div>
    </div>
</form>
</div>
</body>
</html>