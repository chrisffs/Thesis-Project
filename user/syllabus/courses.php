<?php
include '../../../db/conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../src/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script defer src="../../../src/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="bg-danger">
    <div class="container">
        <h3 class="p-2"><a href="../../homepage.php"><i class="text-light bi bi-house-door-fill"></a></i></h3>
    </div>
</div>
<div class="container">
<h1><a class="text-decoration-none" href="../index.php">Departments</a> > <?php echo basename(dirname(__FILE__)); ?></h1>

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

// Get the localhost path of the current file
$localhostPath = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$localhostDirectory = dirname($localhostPath);


$sql = "SELECT DISTINCT(DEPT) FROM `syllabusdb`";
$data = mysqli_query($conn, $sql) or die('error');

if(mysqli_num_rows($data) > 0) {
    while($row = mysqli_fetch_assoc($data)) {
        $DEPT = extractStringBetweenChars($row['DEPT'], "(", ")");
        if($DEPT == basename(dirname(__FILE__))) {

            $sql = "SELECT DISTINCT(COURSE) FROM `syllabusdb` WHERE DEPT = '" . $row['DEPT'] . "'";
            $data = mysqli_query($conn, $sql) or die('error');
            if(mysqli_num_rows($data) > 0) {
                while($row = mysqli_fetch_assoc($data)) {
                    $COURSE = extractStringBetweenChars($row['COURSE'], "[", "]");
                    ?>
                        <div>
                            <a href="<?php echo $localhostDirectory ."/". $COURSE; ?>/files.php" class="my-1 btn btn-light"><?php echo $row['COURSE']; ?></a>
                        </div>
                    <?php
                    

                    // Specify the folder name and the preexisting PHP file name
                    $folderName = $COURSE;
                    $fileName = "files.php";

                    // Create the folder
                    if (!file_exists($folderName)) {
                        mkdir($folderName, 0777, true); // The third argument "true" creates nested directories if they don't exist
                        // echo 'Folder created successfully.' . PHP_EOL;
                    } else {
                        // echo 'Folder already exists.' . PHP_EOL;
                    }

                    // Check if the preexisting file exists
                    if (file_exists($fileName)) {

                        // Copy the file to the new folder
                        $destinationPath = $folderName . '/' . $fileName;
                        if (copy($fileName, $destinationPath)) {
                            // echo 'File copied successfully.' . PHP_EOL;
                        } else {
                            // echo 'Failed to copy the file.' . PHP_EOL;
                        }
                    } else {
                        // echo 'The preexisting file does not exist.' . PHP_EOL;
                    }
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
$conn->close();
?>
</div>
<script src="../../../src/js/script.js"></script>
</body>
</html>