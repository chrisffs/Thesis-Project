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
    <link rel="stylesheet" href="../src/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script defer src="../src/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
  <div class="w-50 mx-auto">
    <h1>Admin</h1>
    <?php
      
      if(isset($_SESSION['invalid'])){
          $invalid = $_SESSION['invalid'];
          ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?= $invalid?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php
          unset($_SESSION['invalid']);
      }
    ?>
    <form class="row g-3 needs-validation" action="admin_login.php" method="post" novalidate>
      <div class="col-md-12">
        <label for="username-val" class="form-label">Username</label>
        <div class="input-group has-validation">
          <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
          <input type="text" class="form-control" id="username-val" aria-describedby="inputGroupPrepend" name="username" required>
          <div class="invalid-feedback">
            Please enter a username.
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <label for="password-val" class="form-label">Password</label>
        <div class="input-group has-validation">
          <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-lock"></i></span>
          <input type="password" class="form-control" id="password-val" aria-describedby="inputGroupPrepend" name="password" required>
          <div class="invalid-feedback">
            Please enter a password.
          </div>
        </div>
      </div>
      
      <!-- <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
          <label class="form-check-label" for="invalidCheck">
            Agree to terms and conditions
          </label>
          <div class="invalid-feedback">
            You must agree before submitting.
          </div>
        </div>
      </div> -->
      <div class="col-12">
        <button class="btn btn-primary" type="submit" value="login" name="login">Submit form</button>
      </div>
    </form>
  </div>
  
</div>
  

<script src="../src/js/script.js"></script>
</body>
</html>