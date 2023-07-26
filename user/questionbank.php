<?php
include '../db/conn.php';
session_start();

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['submit_excel']))
{
    $fileName = $_FILES['excel']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['excel']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($data as $row)
        {
            if($count > 0)
            {
                $today = date('y-m-d');
                $department = mysqli_real_escape_string($conn, $row['0']);
                $course = mysqli_real_escape_string($conn, $row['1']);
                $year = mysqli_real_escape_string($conn, $row['2']);
                $subject = mysqli_real_escape_string($conn, $row['3']);
                $term = mysqli_real_escape_string($conn, $row['4']);
                $semester = mysqli_real_escape_string($conn, $row['5']);
                $question = mysqli_real_escape_string($conn, $row['6']);
                $a = mysqli_real_escape_string($conn, $row['7']);
                $b = mysqli_real_escape_string($conn, $row['8']);
                $c = mysqli_real_escape_string($conn, $row['9']);
                $d = mysqli_real_escape_string($conn, $row['10']);
                $answer = mysqli_real_escape_string($conn, $row['11']);

                $query = "INSERT INTO `questionbankchecker_tbl` (`Department`, `Course`, `Year`, `Subject`, `Term`, `Semester`, `Question`, `A`, `B`, `C`, `D`, `Answer`, `Upload_Date`) VALUES ('$department', '$course', '$year', '$subject', '$term', '$semester', '$question', '$a', '$b', '$c', '$d', '$answer', '$today')";
                
                $query_run = mysqli_query($conn, $query);
                $msg = true;
            }
            else
            {
                $count = "1";
            }
        }

        if(isset($msg))
        {
            $_SESSION['message'] = "Questions uploaded Succesfully. Wait for Admin to Accept your Questions.";
            header("Location: addquestions.php"); 
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Questions upload Failed.";
            header("Location: addquestions.php"); 
            exit(0); 
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: addquestions.php');
        exit(0);
    }
}