<?php 
include '../db/conn.php';
session_start();

if(isset($_POST['login'])) {

    $username_in = $_POST['username'];
    $pass_in = $_POST['password'];

    $sql = "SELECT * FROM accounts_tbl WHERE username = '$username_in' AND password = '$pass_in' AND type = 'user'";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $_SESSION['ID'] = $row['ID'];
            $_SESSION['id_number'] = $row['id_number'];
            $_SESSION['tupv_id'] = $row['tupv_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['full_name'] = $row['full_name'];
            $_SESSION['department'] = $row['department'];
            $_SESSION['type'] = $row['type'];
        }

            header('location:homepage.php');
            exit(0);
        } else {
            $_SESSION['invalid'] = "Wrong Username or Password!";
            header("Location: index.php");
            exit(0);
        }
} 
?>