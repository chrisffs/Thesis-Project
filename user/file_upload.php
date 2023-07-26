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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../src/css/bootstrap.min.css">
    <link rel="stylesheet" href="../src/css/custom.css">
    <link rel="stylesheet" href="../src/css/yearpicker.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script defer src="../src/js/bootstrap.bundle.min.js"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <form action="uploads.php" method="post" enctype="multipart/form-data">
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
                <label for="department">Department</label>
                <select class="form-select form-select-md" aria-label=".form-select-md example" name="department" id="department">
                    <option hidden selected>Select Department</option>
                    <option value="College of Engineering">College of Engineering</option>
                    <option value="College of Automation and Control Engineering">College of Automation and Control Engineering</option>
                    <option value="College of Engineering Technology">College of Engineering Technology</option>
                </select>
            </div>
            <div class="col">
                <label for="course">Course</label>
                <select class="form-select form-select-md" aria-label=".form-select-md example" name="course" id="course">
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="year">Year</label>
                <input type="text" name="year" id="year" class="yearpicker form-control" value=""/>
            </div>
            <div class="col">
                <label for="semester">Semester</label>
                <select class="form-select form-select-md" aria-label=".form-select-md example" name="semester" id="semester">
                    <option hidden selected>Select Semester</option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                </select>
            </div>
            <div class="col">
                <label for="term">Term</label>
                <select class="form-select form-select-md" aria-label=".form-select-md example" name="term" id="term">
                    <option hidden selected>Select Term</option>
                    <option value="Prelim">Prelim</option>
                    <option value="Mid Term">Mid Term</option>
                    <option value="End Term">End Term</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="subject">Subject</label>
                <select class="form-select form-select-md" aria-label=".form-select-md example" name="subject" id="subject">
                    <option hidden selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col">
                <label for="subject_code">Subject Code</label>
                <select class="form-select form-select-md" aria-label=".form-select-md example" name="subject_code" id="subject_code">
                    <option hidden selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col">
                <label for="week_no">Week No.</label>
                <input type="number" name="week_no" id="week_no" min="1" max="13" class="form-control" value=""/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="file" class="form-control" id="file" name="file">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" name="submit" class="btn btn-danger">Upload New Module</button>
            </div>
        </div>
        
      
    
    </form>
</div>
<script src="../src/js/dropdown.js"></script>
<script src="../src/js/yearpicker.js"></script>
</body>
</html>