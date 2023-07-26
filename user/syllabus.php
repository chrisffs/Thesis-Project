
<?php

session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="../src/js/custom.js"></script>

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

   

</head>

<body style="background: #8F0F25;">
  <header>
    <!-- place navbar here -->
    <?php include 'navbar.php' ?> 
  </header>
  <main>
        
  <section class="m-5">
         <div class="table-responsive" id="nmt">
            <div class="container bg-white">


        <!-- <h2 class = "mb-3"><span class="text-danger">E</span>XPIRED <span class="text-danger">L</span>IST</h2> -->
       
         <table class = "table  table-striped table-hover" id="emp-table">
                <thead class="thead-dark text-dark">
                    <tr>

                        <th>Department</th> 
                        <th>Course</th>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>Term</th>
                        <th>Subject</th>
                        <th>Uploaded By</th>
                        <th>File</th>
                        <th>Action</th>
                
                    </tr>

                    <tr>

                                <th>FILTER MODULE</th> 
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>

                                </tr>
                    <tr>

                        <th col-index = 1>
                          <select class="table-filter" onchange="filter_rows()">
                      <option value="all"></option>
                          </select>
                        </th> 

                        <th col-index = 2>
                        <select class="table-filter" onchange="filter_rows()">
                        <option value="all"></option>
                    </select>
                        </th>

                        <th col-index = 3>
                        <select class="table-filter" onchange="filter_rows()">
                    <option value="all"></option>
                </select>
                        </th>

                        <th col-index = 4>
                        <select class="table-filter" onchange="filter_rows()">
                    <option value="all"></option>
                </select>
                        </th>

                        <th col-index = 5>
                        <select class="table-filter" onchange="filter_rows()">
                    <option value="all"></option>
                </select>
                        </th>


                        <th col-index = 6>
                        <select class="table-filter" onchange="filter_rows()">
                    <option value="all"></option>
                </select>
                        </th>

                       
                
                    </tr>
            </thead>
            <tbody>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "thesis_db";
            $connection = new mysqli($servername, $username, $password, $database);


            $sql = "SELECT * FROM syllabusdb";
            $result = $connection->query($sql);
            
          if($connection->connect_error){
          die("Connection failed: " . $connection->connect_error);
            }

            if(!$result){
                die("Invalid Property " . $connection->connect_error);
            }

            while($row = $result-> fetch_assoc()){
            
            
              echo '<tr>'
              . '<td data-title="Department">' . $row["DEPT"] . '</td>'
              . '<td data-title="Course">' . $row["COURSE"] . '</td>'
              . '<td data-title="Year">' . $row["YEAR"] . '</td>'
              . '<td data-title="Semester">' . $row["SEMESTER"] . '</td>'
              . '<td data-title="Term">' . $row["TERM"] . '</td>'
              . '<td data-title="Term">' . $row["SUBJECT_NAME"] . '</td>'
              . '<td data-title="Uploaded By">' . $row["UB"] . '</td>'
              . '<td data-title="File Name">' . $row["FILENAME"] . '</td>'
              . '<td data-title="Action">'
              . '<a href="../db/uploaded_files/' . $row["FILENAME"] . '" class="btn btn-success shadow-none m-1">View</a>'
              . '<a href="../db/uploaded_files/' . $row["FILENAME"] . '" download="../db/uploaded_files/' . $row["FILENAME"] . '"class="btn btn-info shadow-none m-1">download</a>'
              . '</td>'
              . '</tr>';
          

            }
            // edit.php?idno='.$row["IDno"].'
            ?>

            </tbody>
            </table>
            </div>
            </div>
        </section>
    

 
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->

  <script>
    
        getUniqueValuesFromColumn()
        
    </script>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>