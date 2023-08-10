<?php
include '../../db/conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../src/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../src/css/bootstrap-icons.css">
    <script defer src="../../src/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
<form action="paper.php" method="post" enctype="multipart/form-data">
    <label for="no_of_questions">No of Questions</label>
    <input type="number" name="no_of_questions" id="no_of_questions" min="1" max="60" class="form-control" value="">

    <select class="form-select form-select-md" aria-label=".form-select-md example" name="subject" id="subject">
        <option hidden selected>Select Subject</option>
        <option value="Science">Science</option>
        <option value="History">History</option>
        <option value="Geography">Geography</option>
    </select>
    <select class="form-select form-select-md" aria-label=".form-select-md example" name="year" id="year">
        <option hidden selected>Select Year</option>
        <option value="1st">1st</option>
        <option value="2nd">2nd</option>
        <option value="3rd">3rd</option>
        <option value="4th">4th</option>
    </select>
    <select class="form-select form-select-md" aria-label=".form-select-md example" name="term" id="term">
        <option hidden selected>Select Term</option>
        <option value="Prelim">Prelim</option>
        <option value="Midterm">Midterm</option>
        <option value="Endterm">Endterm</option>
    </select>
    <select class="form-select form-select-md" aria-label=".form-select-md example" name="semester" id="semester">
        <option hidden selected>Select Semester</option>
        <option value="1st">1st</option>
        <option value="2nd">2nd</option>
        <option value="3rd">3rd</option>
    </select>
    <button type="submit" target="_blank" name="submit" class="btn btn-danger">Generate Paper</button>
</form>
</div>

<script src="../../src/js/script.js"></script>
</body>
</html>