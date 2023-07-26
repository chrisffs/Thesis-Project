<!doctype html>
<html lang="en">

<head>
  <title>QB checker</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <h1>Check Questions</h1>

    
  <section class="m-5">
         <div class="table-responsive" id="nmt">
            <div class="container bg-white">


        <!-- <h2 class = "mb-3"><span class="text-danger">E</span>XPIRED <span class="text-danger">L</span>IST</h2> -->
       
         <table class = "table  table-striped table-hover">
                <thead class="thead-dark text-dark">
                    <tr>

                        <th>Department</th> 
                        <th>Course</th>
                        <th>Year</th>
                        <th>Subject</th> 
                        <th>Term</th>
                        <th>Semester</th>
                        <th>Question</th> 
                        <th>A</th>
                        <th>B</th>
                        <th>C</th> 
                        <th>D</th>
                        <th>Answer</th>
                        <th>Date Sent</th> 
                        
                       
                
                    </tr>
            </thead>
            <tbody>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "thesis_db";
            $connection = new mysqli($servername, $username, $password, $database);


            $sql = "SELECT * FROM questionbankchecker_tbl";
            $result = $connection->query($sql);
            
          if($connection->connect_error){
          die("Connection failed: " . $connection->connect_error);
            }

            if(!$result){
                die("Invalid Property " . $connection->connect_error);
            }

            while($row = $result-> fetch_assoc()){
            
            
                echo '<tr>'
                . '<td data-title="Department">' . $row["Department"] . '</td>'
                . '<td data-title="Course">' . $row["Course"] . '</td>'
                . '<td data-title="Year">' . $row["Year"] . '</td>'
                . '<td data-title="Subject">' . $row["Subject"] . '</td>'
                . '<td data-title="Term">' . $row["Term"] . '</td>'
                . '<td data-title="Semester">' . $row["Semester"] . '</td>'
                . '<td data-title="Question">' . $row["Question"] . '</td>'
                . '<td data-title="A">' . $row["A"] . '</td>'
                . '<td data-title="B">' . $row["B"] . '</td>'
                . '<td data-title="C">' . $row["C"] . '</td>'
                . '<td data-title="D">' . $row["D"] . '</td>'
                . '<td data-title="Answer">' . $row["Answer"] . '</td>'
                . '<td data-title="Date Sent">' . $row["Upload_Date"] . '</td>'
                . '<td data-title="Action">'
                . '<a href="../DELETE.php?IDNO=' . $row["ID"] . '&deleted=true" class="btn btn-danger shadow-none m-1"> <i class="fa-solid fa-eraser"></i></a>'
                . '</td>'
                . '</tr>';
                
            

            }
       
            ?>

                <a href="../DELETE.php?delfa=true" class="btn btn-danger shadow-none m-1" onclick="return confirm('Submit all Questions?')">SUBMIT QUESTIONS</a>

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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>