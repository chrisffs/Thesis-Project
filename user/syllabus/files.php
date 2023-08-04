<?php
include '../../../../db/conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../../src/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script defer src="../../../../src/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="bg-danger">
    <div class="container">
        <h3 class="p-2"><a href="../../../homepage.php"><i class="text-light bi bi-house-door-fill"></a></i></h3>
    </div>
    
</div>
<div class="container">
<h1><a class="text-decoration-none" href="../../index.php">Departments</a>  > <a class="text-decoration-none" href="../courses.php"><?php echo basename(dirname(dirname(__FILE__))); ?></a> > <?php echo basename(dirname(__FILE__)); ?></h1>

<?php
function extractStringBetweenChars($inputString, $startChar, $endChar) {
    $startPos = strpos($inputString, $startChar);
    
    if ($startPos === false) {
        return ""; // Start character not found in the input string
    }
    
    $endPos = strpos($inputString, $endChar, $startPos + 1);
    
    if ($endPos === false) {
        return ""; // End character not found in the input string after the start position
    }
    
    $extractedString = substr($inputString, $startPos + 1, $endPos - $startPos - 1);
    return $extractedString;
}

$sql = "SELECT DISTINCT(COURSE) FROM `syllabusdb`";
$data = mysqli_query($conn, $sql) or die('error');

if(mysqli_num_rows($data) > 0) {
    while($row = mysqli_fetch_assoc($data)) {

        $COURSE = extractStringBetweenChars($row['COURSE'], "[", "]");

        if($COURSE == basename(dirname(__FILE__))) {

            $sql = "SELECT FILENAME FROM `syllabusdb` WHERE COURSE = '" . $row['COURSE'] . "'";
            $data = mysqli_query($conn, $sql) or die('error');

            if(mysqli_num_rows($data) > 0) {
                while($row = mysqli_fetch_assoc($data)) {
                ?>
                <div>
                    <a class="text-decoration-none" href="../../../../db/uploaded_files/<?php echo $row['FILENAME']?>"><?php echo $row['FILENAME'];?></a>
                </div>
                <?php
                }
            } else {
                return false;
            }
        }
        
    }
} else {
?>
    <p class="text-center">No modules uploaded...</p>
<?php
}
?>
</div>
<script src="../../../../src/js/script.js"></script>
</body>
</html>