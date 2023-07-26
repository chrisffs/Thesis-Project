<?php 
   session_start();
   include "./db/conn.php";
   
   if (isset($_GET['deleted'])) {
       // Check if IDNO is set and is a number
       if (isset($_GET['IDNO']) && is_numeric($_GET['IDNO'])) {
           $id = $_GET['IDNO'];
           $id = mysqli_real_escape_string($conn, $id); // Assuming $conn is your database connection
           
           // Check if the row with the given ID exists before attempting to delete
           $check_sql = "SELECT COUNT(*) as count FROM questionbankchecker_tbl WHERE `ID` = '$id'";
           $result = $conn->query($check_sql);
           $row = $result->fetch_assoc();
           if ($row['count'] > 0) {
               // Row exists, proceed with deletion
               $delete_sql = "DELETE FROM questionbankchecker_tbl WHERE `ID` = '$id'";
       
               if ($conn->query($delete_sql) === TRUE) {
                   $_SESSION['DeleteMsg'] = "Removed Successfully!";
               } else {
                   $_SESSION['DeleteMsg'] = "Error deleting row: " . $conn->error;
               }
           } else {
               $_SESSION['DeleteMsg'] = "Row with ID '$id' does not exist.";
           }
   
           header('location: ./admin/questionbankchecker.php');
           exit; // Always include exit or die after a header redirect to prevent further execution of the script.
       } else {
           $_SESSION['DeleteMsg'] = "Invalid IDNO parameter.";
           header('location: ./admin/questionbankchecker.php');
           exit;
       }
   }

?>


<?php 
include "./db/conn.php";

// Your existing delete code...

// Add another condition to check for the 'delfa' parameter
if (isset($_GET['delfa'])) {
    $sql3 = "INSERT INTO questionbank_tbl (`ID`,`Department`,`Course`,`Year`,`Subject`,`Term`,`Semester`,`Question`,`A`,`B`,`C`,`D`,`Answer`) SELECT  `ID`,`Department`,`Course`,`Year`,`Subject`,`Term`,`Semester`,`Question`,`A`,`B`,`C`,`D`,`Answer` FROM questionbankchecker_tbl";
    
    if ($conn->query($sql3) === TRUE) {
        $sql = "DELETE FROM questionbankchecker_tbl";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['DeleteMsg'] = "Removed Successfully!";
            header('location: ./admin/questionbankchecker.php');
        } else {
            echo "Unable to delete records.";
        }
    } else {
        echo "Unable to submit questions.";
    }
}
?>



//     $id2 = $_GET['ID'];
    // $sql3 = "INSERT INTO questionbank_tbl (`ID`,`Department`,`Course`,`Year`,`Subject`,`Term`,`Semester`,`Question`,`A`,`B`,`C`,`D`,`Answer`) SELECT  `ID`,`Department`,`Course`,`Year`,`Subject`,`Term`,`Semester`,`Question`,`A`,`B`,`C`,`D`,`Answer` FROM questionbankchecker_tbl WHERE `ID` = '$id2'";