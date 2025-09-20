<?php
session_start();
include 'db.php';
if (isset($_POST['btnlogin'])) {
    $inp_useremail =  $_POST["inp_useremail"];
    $inp_userpass =  $_POST["inp_userpass"];
    $checkAccount =  mysqli_query($con, "SELECT * FROM users WHERE user_email = '$inp_useremail'");

    if (mysqli_num_rows($checkAccount) > 0) {
        $userData =  mysqli_fetch_assoc($checkAccount);
        $checkpassword  = password_verify($inp_userpass, $userData["user_password"]);

        if ($checkpassword) {
            $_SESSION["username"] = $userData["user_name"];
            $_SESSION["useremail"] = $userData["user_email"];
            $_SESSION["role"] = $userData["role_id"];
            if ($userData["role_id"] == 1) {
                header("Location: admin/index.php");
            } else {
                header("Location: index.php");
            }
        } else {
            echo "error";
        }
    } else {
        echo "<script>alert('Account Not Found')</script>";
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
                <h5 class="mb-0">Login your account</h5>
            </div>

            <form id="registerForm" novalidate method="post">


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


                <div class="d-grid mb-3">
                    <input type="submit" class="btn btn-primary btn-lg" value="Login" name="btnlogin" />
                </div>

                <p class="text-center mb-0">Don't have an account? <a href="register.php" class="fw-semibold">Register</a></p>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>