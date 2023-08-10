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
    <link rel="stylesheet" href="../../src/css/testpaper.css">
    <script defer src="../../src/js/bootstrap.bundle.min.js"></script>
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
</head>
<body>
<div class="container">
<?php
// For verifying if the form method is POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("POST request method required");
}

if(isset($_POST['submit'])) {
    $noq = $_POST['no_of_questions'];
    $sub = $_POST['subject'];
    $year = $_POST['year'];
    $term = $_POST['term'];
    $sem = $_POST['semester'];

    $sql = "SELECT * FROM `questionbank_tbl` WHERE Subject LIKE '$sub' AND Year LIKE '$year' AND Term LIKE '$term' And Semester LIKE '$sem' ORDER BY RAND() LIMIT $noq";
    $data = mysqli_query($conn, $sql) or die('error');
    ?>
<div class="container-custom" id="testpaper-show">
    <div id="testpaper-div">
        <h1>Test Paper Content</h1>
        <div class="border border-dark p-5">
            <?php
            if (mysqli_num_rows($data) > 0) {
                $i = 1;
                while ($row = mysqli_fetch_assoc($data)) {
                    ?>
                    <div class="item-div">
                        <p class="text-md"><?php echo $i ?>.) <?php echo $row['Question'] ?></p>
                        <div class="choices-div row">
                            <div class="col">
                                <p class="text-md">a. <?php echo $row['A'] ?></p>
                            </div>
                            <div class="col">
                                <p class="text-md">b. <?php echo $row['B'] ?></p>
                            </div>
                            <div class="col">
                                <p class="text-md">c. <?php echo $row['C'] ?></p>
                            </div>
                            <div class="col">
                                <p class="text-md">d. <?php echo $row['D'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                }
            }
            ?>
        </div>
    </div>

    <div class="pagebreak my-5"> </div>

    <!-- Separate page to display answers -->
    <div class="border border-dark p-5" id="answersheet-div">
        <div class="grid-container">
            <?php
            mysqli_data_seek($data, 0); // Reset the data pointer to the beginning
            if (mysqli_num_rows($data) > 0) {
                $i = 1;
                while ($row = mysqli_fetch_assoc($data)) {
                    // Check if it's the start of a new set of 20 iterations
                    if (($i - 1) % 20 === 0) {
                        if ($i > 1) {
                            // Close the previous set of divs
                            echo '</div>';
                        }
                        // Open a new set of divs based on the iteration count
                        if (($i - 1) / 20 === 0) {
                            echo '<div class="oneTotwenty me-2">';
                        } elseif (($i - 1) / 20 === 1) {
                            echo '<div class="twentyoneToforty me-2">';
                        } elseif (($i - 1) / 20 === 2) {
                            echo '<div class="fortyoneTofifty me-2">';
                        }
                    }
                    ?>
                    <div class="row ">
                        <div class="col-2 my-2 ">
                            <p class="text-no"><?php echo $i ?>.) </p>
                        </div>
                        <div class="col-10 d-flex py-2 px-1 mx-auto choices1 border border-dark border-top-0 border-bottom-0">
                            <div class="circles d-flex align-items-center justify-content-center ms-auto me-1"><div><p class="text-md">A</p></div></div>
                            <div class="circles d-flex align-items-center justify-content-center mx-1"><div><p class="text-md">B</p></div></div>
                            <div class="circles d-flex align-items-center justify-content-center mx-1"><div><p class="text-md">C</p></div></div>
                            <div class="circles d-flex align-items-center justify-content-center ms-1 me-auto"><div><p class="text-md">D</p></div></div>
                        </div>
                    </div>
                    <?php
                    $i++;
                }
                // Close the last set of divs
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>



<!-- REAL TESPAPER -->
<div class="d-none" id="testpaper-div">
    <div class="">
        <?php
        mysqli_data_seek($data, 0); // Reset the data pointer to the beginning
        if (mysqli_num_rows($data) > 0) {
            $i = 1;
            while ($row = mysqli_fetch_assoc($data)) {
                ?>
                <div class="item-div">
                    <p class="text-md"><?php echo $i ?>.) <?php echo $row['Question'] ?></p>
                    <div class="choices-div row">
                        <div class="col">
                            <p class="text-md">a. <?php echo $row['A'] ?></p>
                        </div>
                        <div class="col">
                            <p class="text-md">b. <?php echo $row['B'] ?></p>
                        </div>
                        <div class="col">
                            <p class="text-md">c. <?php echo $row['C'] ?></p>
                        </div>
                        <div class="col">
                            <p class="text-md">d. <?php echo $row['D'] ?></p>
                        </div>
                    </div>
                </div>
                <?php
                $i++;
            }
        }
        ?>
    </div>
</div>
<div class="pagebreak d-none"></div>
<!-- Separate page to display answers -->
<div class="d-none mt-4" id="answersheet-div">
    <div class="grid-container">
        <?php
        mysqli_data_seek($data, 0); // Reset the data pointer to the beginning
        if (mysqli_num_rows($data) > 0) {
            $i = 1;
            while ($row = mysqli_fetch_assoc($data)) {
                // Check if it's the start of a new set of 20 iterations
                if (($i - 1) % 20 === 0) {
                    if ($i > 1) {
                        // Close the previous set of divs
                        echo '</div>';
                    }
                    // Open a new set of divs based on the iteration count
                    if (($i - 1) / 20 === 0) {
                        echo '<div class="oneTotwenty me-2">';
                    } elseif (($i - 1) / 20 === 1) {
                        echo '<div class="twentyoneToforty me-2">';
                    } elseif (($i - 1) / 20 === 2) {
                        echo '<div class="fortyoneTofifty me-2">';
                    }
                }
                ?>
                <div class="row ">
                    <div class="col-2 my-2 ">
                        <p class="text-no"><?php echo $i ?>.) </p>
                    </div>
                    <div class="col-10 d-flex py-2 px-1 mx-auto choices2 border border-dark border-top-0 border-bottom-0">
                        <div class="circles d-flex align-items-center justify-content-center ms-auto me-1"><div><p class="text-md">A</p></div></div>
                        <div class="circles d-flex align-items-center justify-content-center mx-1"><div><p class="text-md">B</p></div></div>
                        <div class="circles d-flex align-items-center justify-content-center mx-1"><div><p class="text-md">C</p></div></div>
                        <div class="circles d-flex align-items-center justify-content-center ms-1 me-auto"><div><p class="text-md">D</p></div></div>
                    </div>
                </div>
                <?php
                $i++;
            }
            // Close the last set of divs
            echo '</div>';
        }
        ?>
    </div>
</div>
<?php
}
?>
<div>
    <button id="print-btn" class="fixed-bottom btn btn-danger">Print</button>
</div>
<script src="../../src/js/choices.js"></script>
</body>
</html>
