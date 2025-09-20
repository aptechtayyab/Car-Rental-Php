<?php
include "db.php";
if (isset($_POST["btnregister"])) {
  $inp_username =  $_POST["inp_username"];
  $inp_useremail =  $_POST["inp_useremail"];
  $inp_userpass =  $_POST["inp_userpass"];
  $inp_usercpass =  $_POST["inp_usercpass"];
  $checkUserInDb = mysqli_query($con, "SELECT * FROM users WHERE user_email = '$inp_useremail'");

  if (mysqli_num_rows($checkUserInDb) > 0) {
    echo "<script>alert('Email already exists')</script>";
  } else if ($inp_userpass != $inp_usercpass) {
    echo "<script>alert('password and confirm password dont matched')</script>";
  } else {
    $hashpass = password_hash($inp_userpass, PASSWORD_DEFAULT);

    $insertQuery = "INSERT INTO `users`(`user_name`, `user_email`, `user_password`) VALUES ('$inp_username','$inp_useremail','$hashpass')";

    $response = mysqli_query($con, $insertQuery);

    if ($response) {
      echo "<script>alert('User Registerd!')</script>";
    }
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #f8fafc, #e9f5ff);
    }

    .card {
      max-width: 420px;
      width: 100%;
      border: 0;
      border-radius: 1rem;
      box-shadow: 0 10px 30px rgba(18, 38, 63, 0.08);
    }

    .form-control:focus {
      box-shadow: none;
    }

    .logo {
      width: 64px;
      height: 64px;
      background: linear-gradient(45deg, #4f46e5, #06b6d4);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 700;
    }
  </style>
</head>

<body>
  <div class="d-flex min-vh-100 align-items-center justify-content-center">
    <div class="card p-4">
      <div class="text-center mb-3">
        <div class="logo mx-auto mb-2">TW</div>
        <h5 class="mb-0">Create your account</h5>
        <small class="text-muted">Join us — it's quick and easy</small>
      </div>

      <form id="registerForm" novalidate method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" placeholder="Enter username" required name="inp_username">
          <div class="invalid-feedback">Please enter a username.</div>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" placeholder="name@example.com" required name="inp_useremail">
          <div class="invalid-feedback">Please enter a valid email.</div>
        </div>

        <div class="mb-3 position-relative">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Enter password" minlength="6" required name="inp_userpass">
          <div class="invalid-feedback">Password must be at least 6 characters.</div>
        </div>

        <div class="mb-3 position-relative">
          <label for="confirmPassword" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="confirmPassword" placeholder="Re-type password" required name="inp_usercpass">
          <div class="invalid-feedback" id="confirmFeedback">Passwords do not match.</div>
        </div>

        <div class="d-grid mb-3">
          <input type="submit" class="btn btn-primary btn-lg" value="Register" name="btnregister" />
        </div>

        <p class="text-center mb-0">Already have an account? <a href="login.php" class="fw-semibold">Login</a></p>
      </form>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>