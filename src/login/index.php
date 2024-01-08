<?php
		include ('../../server/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Login Page</title>
    <style>
        body {
          background-color: #f8f9fa;
          overflow-x: hidden; 
        }
    
        .container-fluid {
          margin-top: 140px;
          margin-left: 200px;
        }
    
        .signup-container {
          background-color: #D9D9D9;
          border: 2px solid #dee2e6;
          border-radius: 15px;
          padding: 20px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          margin-top: 15px;
        }
    
        .logo {
          max-width: 80%;
          height: auto;
          text-align: center;
        }
    
        .btn-custom-color {
          background-color: #2C4B24;
          color: #ffffff; 
          border-radius: 15px;
        }

        .form-control{
        border-radius: 15px;
        }       

        .d-block{
          outline: none;
        }

        .text-decoration-none{
          color: black;
        }
      </style>
     
    </head>
    <body>
    
    <div class="container-fluid">
        <div class="row">
          <!-- Logo Box -->
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <img src="..\..\res\WELL CITY LOGO.png" alt="Logo" class="logo">
          </div>
    
          <!-- Sign Up Form -->
          <div class="col-md-4">
            <div class="signup-container">
              <h2 class="mb-4 text-center fw-bold">Your Wellness, Your Way!</h2>
              
              <?php
              session_start();

              // Check if the "user" session variable is set, meaning the user is already logged in
              if (isset($_SESSION["user"])) {
                  // Redirect to the homepage
                  header("Location: ../homepage/index.php");
                  die();
              }
              if (isset($_POST["login"])) {
              $username = $_POST["username"];
              $password = $_POST["password"];
              require_once "../../server/connection.php";

              $sql = "SELECT * FROM tbl_users WHERE username = '$username'";
              $result = mysqli_query($conn, $sql);
              if ($result){
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
              // Check if the user exists and verify the password
                if ($user && password_verify($password, $user["password"])) {
                  session_start();
                  $_SESSION["user"] = $user["username"];;
                  header("Location: ../homepage/index.php");
                  die();
                } else {
                    echo "<div class='alert alert-danger'>Username or Password does not match</div>";
                }
                } else {
                  // Display an alert for database query error
                  echo "<div class='alert alert-danger'>Error executing database query</div>";
                }
              }
              ?>

              <form action="index.php" method="post" >
              <!-- Username -->
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="username" placeholder="Username" required>
                  <label for="username">Username</label>
                </div>
    
              <!-- Password -->
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                <label for="password">Password</label>
              </div>
    
                <input type="submit" value="Log in" name="login" class="btn btn-custom-color mx-auto d-grid gap-2 col-6 fw-bold">
    
              </form>
              
              <a href="#" class="text-decoration-none mt-3 d-block text-center" >Forgot password?</a>
              <a href="../signup/index.php" class="text-decoration-none mt-3 d-block text-center" >Sign Up</a>
            </div>
          </div>
        </div>
      </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>