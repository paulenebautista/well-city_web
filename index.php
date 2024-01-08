<?php 
    include ('server/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Well City Web-Application</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
      <div class="col-md-4 d-flex justify-content-center align-items-center">
        <img src="res\WELL CITY LOGO.png" alt="Logo" class="logo">
      </div>

        <div class="col-md-5">
            <h2 class="mb-2 col-mb-3 fw-bold fs-1 text-center">Your Wellness, Your Way!</h2>
            <h2 class="mb-4 col-mb-3 text-center fs-2">Join us today or Login to your account.</h2>
            <div class="signup-container d-flex flex-column align-items-center">
                <div class="button">
                    <div type="submit" class="btn-lg p-2 fs-5 fw-bold">
                        <a href="src/signup/index.php" class="text">Sign up</a>
                    </div>
                </div>

                <div class="button1">
                    <div type="submit" class="gap-2 p-2 fs-5 fw-bold ">
                        <a href="src/login/index.php" class="text1">Log in</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

    <!--This page is outside link! Dito muna ung pinaka main page, then ito ung di pa nakakalogin ung user, 
    para maprevent ung paglipat bigla ng page sa login inned paged. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
