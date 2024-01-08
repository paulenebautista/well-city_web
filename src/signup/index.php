<?php
		include ('../../server/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <title>Sign Up</title>
  <style>
    body {
      background-color: #f8f9fa;
      overflow-x: hidden; 
    }

    .container-fluid {
      margin-top: 100px;
      margin-left: 200px;
    }

    .signup-container {
      background-color: #D9D9D9;
      border: 2px solid #dee2e6;
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .logo {
      max-width: 90%;
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
  </style>
 
</head>
<body>

  <div class="container-fluid">
    <div class="row">
      <!-- Logo Box -->
      <div class="col-md-4 d-flex justify-content-center align-items-center">
        <img src="../../res\WELL CITY LOGO.png" alt="Logo" class="logo">
      </div>

      <!-- Sign Up Form -->
      <div class="col-md-4">
        <div class="signup-container">
          <h2 class="mb-4 text-center fw-bold">Sign Up</h2>

          <?php
          // Check if the form is submitted
          if (isset($_POST["submit"])) {
          // Get form data
          $username = $_POST["username"];
          $email = $_POST["email"];
          $password = $_POST["password"];
          $confirmPassword = $_POST["confirmPassword"];

          $hash = password_hash($password, PASSWORD_DEFAULT);

          $errors = array();
           
           if (empty($username) OR empty($email) OR empty($password) OR empty($confirmPassword)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$confirmPassword) {
            array_push($errors,"Password does not match");
           }
           require_once "../../server/connection.php";
           $sql = "SELECT * FROM tbl_users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO tbl_users (username, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$username, $email, $hash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
                // Redirect to another page after successful insertion
                header("Location: ../login/index.php");
                exit(); // Ensure that no further output is sent after the header
            } else {
                die("Something went wrong");
            }
          }
        }
        ?>
          <form action="index.php" method="post" >
          <!-- Username -->
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="username" placeholder="Username" required>
              <label for="username">Username</label>
          </div>

          <!-- Email -->
          <div class="form-floating mb-3">
              <input type="email" class="form-control" name="email" placeholder="Email" required>
              <label for="email">Email</label>
          </div>

          <!-- Password -->
          <div class="form-floating mb-3">
              <input type="password" class="form-control" name="password" placeholder="Password" required>
              <label for="password">Password</label>
          </div>

          <!-- Confirm Password -->
          <div class="form-floating mb-3">
              <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" required>
              <label for="confirmPassword">Confirm Password</label>
          </div>
            
          <input type="submit" class="btn btn-custom-color mx-auto d-grid gap-2 col-6 fw-bold" value="Sign up" name="submit">

          </form>
          
          <p class="mt-3 text-center">Already have an account? <a href="../login/index.php" class="text-decoration-none">Login</a></p>
        </div>
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
