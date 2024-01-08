<?php 
        include ('../../temp/header.php'); 
    ?>

<!DOCTYPE html>
<html>
    <title> Profile </title>
    <!---header and nav bar--->
 
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Profile Page</title>
  <style>
    body {
	  background: #e1e1e6;
	  font-family: "Lato", sans-serif;   
    border-radius: 15px;
    }

    .shadow {
	  box-shadow: 0 0px 0px rgba(0, 0, 0, 0.1) !important;
    }

    .profile-tab-nav {
	  min-width: 250px;
    }

    .tab-content {
	  flex: 1;
    border-radius: 15px;
    }

    .nav-pills a.nav-link {
	  padding: 15px 20px;
	  color: #333;
    }

    .nav-pills a.nav-link i {
	  width: 20px;
    }

    .img-circle img {
	  height: 100px;
	  width: 100px;
	  border-radius: 100%;
	  border: 0px solid #fff;
    }
  
    .container{
    bottom: 100px;
    }

    .form-control[type=text], form-control[type=password], class[text-center]{
    background-position: 10px 12px;
    background-repeat: no-repeat;
    background: #e8e8e8;
    width: 90%;
    font-size: 16px;
    margin-bottom: 12px;
    outline: none;
    }

    .form-select{
    height: 38px; 
    background-color: #fff; 
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    }

    .modal{
      background: none;
    }

    .rating {
    display: inline-block;
    justify-content: center;
    align-items: center;
    margin-top: 30px; 
    margin-left: 200px;
    }

    .rating input {
    display: none;
    }

    .rating label {
    float: right;
    cursor: pointer;
    color: #ccc;
    transition: color 0.3s;
    text-align: center;
    }

    .rating label:before {
    content: '\2605';
    font-size: 80px;
    }

    .rating input:checked ~ label,
    .rating label:hover,
    .rating label:hover ~ label {
    color: #6f00ff;
    transition: color 0.3s;
    }

    #ratingMessage {
      margin-top: 10px;
      margin-left: 200px;
      text-align: center;
      font-size: 30px;
      color: #333;
    }

    button{
      margin-left: 200px;
    }
  </style>
</head>
<body>

	<section class="py-5 my-5">
		<div class="container">
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
          <div class="p-3">
            <div class="img-circle text-center mb-3" data-bs-toggle="modal" data-bs-target="#profileModal">
              <img src="https://i1.sndcdn.com/avatars-000285469724-tre8gp-t500x500.jpg" alt="Image" class="shadow" style="cursor: pointer;">
            </div>
            <h5 class="text-center" id="displayedProfilename">Eren Yeager</h5>
            <h6 class="text-center" id="displayedUsername">@erenyeager</h6>
          </div>
          
        <!-- Profile Modal -->
        <div class="modal" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
          <div class="modal-dialog d-flex align-items-center">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title fw-bold">Edit Profile</h5>
                  <button type="button" class="btn-close fa fa-times" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="mb-3">
                    <label for="newProfilename" class="form-label">New Profile Name:</label>
                    <input type="text" class="form-control" id="newProfilename" style="width: 100%">
                  </div>
                  <div class="mb-3">
                    <label for="newUsername" class="form-label">New Username:</label>
                    <input type="text" class="form-control" id="newUsername" style="width: 100%">
                  </div>
                  <div class="mb-4">
                    <label for="newProfilePic" class="form-label">New Profile Picture:</label>
                    <input type="file" class="form-control" id="newProfilePic" accept="image/*" style="padding: 0px; height: 31px;">
                  </div>
                    <button type="button" class="btn btn-primary" onclick="updateProfile()">Save Changes</button>
                    <button type="button" class="btn btn-light" style="margin-left: 10px;">Cancel</button>
                </form>
              </div>
            </div>
          </div>
        </div>

      <script>
        // Function to update the profile
        function updateProfile() {
          const newProfilename = document.getElementById('newProfilename').value;
          const newUsername = document.getElementById('newUsername').value;
          const newProfilePicInput = document.getElementById('newProfilePic');
          const newProfilePicFile = newProfilePicInput.files[0];

          // If a new profile picture is selected
          if (newProfilePicFile) {
            const reader = new FileReader();
            reader.onload = function (e) {
            // Update the profile picture
            document.querySelector('.img-circle img').src = e.target.result;
            // Save the updated picture to localStorage
            localStorage.setItem('profilePic', e.target.result);
            // Update the profile picture in the navigation bar (homepage.php)
            const profilePicInNavbar = document.querySelector('.profile_avatar');
              if (profilePicInNavbar) {
                profilePicInNavbar.src = e.target.result;
              }
            };
              reader.readAsDataURL(newProfilePicFile);
          };
        
            // Update the displayed username outside the modal
            document.getElementById('displayedProfilename').innerText = newProfilename;
            // Save the updated profile name to localStorage
            localStorage.setItem('profilename', newProfilename);

            // Concatenate '@' with the new username and update the displayed username
            document.getElementById('displayedUsername').innerText = '@' + newUsername;
            // Save the updated username to localStorage
            localStorage.setItem('username', newUsername);

            // Close the modal
            const profileModal = new bootstrap.Modal(document.getElementById('profileModal'));
            profileModal.hide();
          }

          // Function to load profile information from localStorage when the page is loaded
          window.onload = function () {
          const storedProfilename = localStorage.getItem('profilename');
          const storedUsername = localStorage.getItem('username');
          const storedProfilePic = localStorage.getItem('profilePic');

          if (storedProfilename) {
            document.getElementById('displayedProfilename').innerText = storedProfilename;
          }

          if (storedUsername) {
            document.getElementById('displayedUsername').innerText = '@' + storedUsername;
          }

          if (storedProfilePic) {
            document.querySelector('.img-circle img').src = storedProfilePic;
          }

          if (storedProfilePic) {
            document.querySelector('.img-circle img').src = storedProfilePic;

            // Update the profile picture in the navigation bar (homepage.php)
            const profilePicInNavbar = document.querySelector('.profile_avatar');
            if (profilePicInNavbar) {
              profilePicInNavbar.src = storedProfilePic;
            }
          }
        };
      
      </script>

          <!-- Navigation Bar -->
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab">
							<i class="fa fa-gear text-center mr-1"></i> 
							Account
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab">
							<i class="fa fa-lock text-center mr-1"></i> 
							Password
						</a>
            <a class="nav-link" id="doctors-tab" data-toggle="pill" href="#doctors" role="tab">
							<i class="fa fa-users text-center mr-1"></i>
							My Doctors
						</a>
            <a>
              <a class="nav-link" id="rate-tab" data-toggle="pill" href="#rate" role="tab">
							<i class="fa fa-star text-center mr-1"></i>
							Rate Us
						</a>
            <a href="../index.php" class="text-decoration-none mt-3 mb-3 d-block text-center" >Logout</a>
					</div>
				</div>

        <?php
        require_once('../../server/connection.php');

        $message = "";

        // Process form data
        if (isset($_POST["submit"])) {
        // Sanitize and validate data
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $age = $_POST["ageInput"];
        $day = $_POST["day"];
        $month = $_POST["month"];
        $year = $_POST["year"];
        $phoneNumber = $_POST["phoneNumber"];
        $email = $_POST["email"];

        // Validate age
        if ($age < 1 || $age > 100) {
          echo "Invalid age.";
          exit();
        }

        // Combine day, month, and year into a valid date format for MySQL
        $birthday = date("Y-m-d", strtotime("$year-$month-$day"));

        // Insert data into the database
        $sql = "INSERT INTO tbl_profile (firstName, lastName, age, birthday, phoneNumber, email) 
          VALUES ('$firstName', '$lastName', '$age', '$birthday', '$phoneNumber', '$email')";

        if ($conn->query($sql) === TRUE) {
          $message = "Registration successful!";
        } else {
          $message = "Error: " . $sql . "<br>" . $conn->error;
        }
        }

        // Close the database connection
        $conn->close();
        ?>

        <!-- Account Setting -->
        <form action="profile.php" method="post">
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4 fw-bold">Account Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>First Name</label>
								  	<input type="text" name="firstName" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Last Name</label>
								  	<input type="text" name="lastName" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
                <div class="mb-3">
                  <label for="age" class="form-label">Age</label>
                  <input type="number" class="form-control" name="ageInput" placeholder="Enter your age" min="1" max="100" style="width: 90%"required>
                </div>
							</div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="birthday" class="form-label">Birthday:</label>
                    <div class="row">
                      <div class="col-md-4">
                        <select class="form-select" name="month" type="month" required>
                          <option value="" disabled selected>Month</option>
                          <option value="1">January</option>
                          <option value="2">February</option>
                          <option value="3">March</option>
                          <option value="4">April</option>
                          <option value="5">May</option>
                          <option value="6">June</option>
                          <option value="7">July</option>
                          <option value="8">August</option>
                          <option value="9">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                        </select>
                      </div>
                      <div class="col">
                        <input type="number" class="form-control" name="day" placeholder="Day" min="1" max="31" required>
                      </div>
                      <div class="col">
                        <input type="number" class="form-control" name="year" placeholder="Year" min="1900" max="2023" required>
                      </div>
                    </div>
                </div>
              </div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Phone number</label>
								  	<input type="text" name="phoneNumber" class="form-control">
								</div>
							</div>
              <div class="col-md-6">
								<div class="form-group">
								  	<label>Email</label>
								  	<input type="text" name="email" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-btn">
              <input type="submit" value="Update" name="submit" class="btn btn-primary">
              <button class="btn btn-light" style="margin-left: 10px;">Cancel</button>
            </div>
            <div><?php echo isset($message) ? $message : ''; ?></div>
					</div>
          </form>

          <!-- Password Setting -->
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<h3 class="mb-4 fw-bold">Password Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Old password</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>New password</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Confirm new password</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
						</div>
						<div>           
							<button class="btn btn-primary" style="margin-left: 1px;">Update</button>
							<button class="btn btn-light" style="margin-left: 10px;">Cancel</button>
						</div>
					</div>

          <!-- Doctors List -->
          <div class="tab-pane fade" id="doctors" role="tabpanel" aria-labelledby="doctors-tab">
						<h3 class="mb-4 fw-bold">My Doctors List</h3>
						<div class="row" style="width: 250%">
            <ol class="list-group list-group-numbered" style="width: 250%">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Doctor Frieren</div>
                Frieren: Beyond Journey's Hospital
              </div>
                <span class="badge bg-primary rounded-pill">2</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Doctor Himmel</div>
                Omega Complex Hospital
              </div>
                <span class="badge bg-primary rounded-pill">4</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Doctor Ilay</div>
                Passion Hospital
              </div>
                <span class="badge rounded-pill">14</span>
            </li>
            </ol>
						</div>
						<div>         
							<button class="btn btn-primary" style="margin-left: 1px; margin-top: 10px">Update</button>
							<button class="btn btn-light" style="margin-left: 10px; margin-top: 10px">Cancel</button>
						</div>
					</div>

          <!-- Rate Us Setting -->
					<div class="tab-pane fade" id="rate" role="tabpanel" aria-labelledby="rate-tab">
						<h3 class="mb-4 fw-bold">Rate Us</h3>
              <div class="rating">
                <input value="5" name="rating" id="star5" type="radio">
                  <label for="star5"></label>
                <input value="4" name="rating" id="star4" type="radio">
                  <label for="star4"></label>
                <input value="3" name="rating" id="star3" type="radio">
                  <label for="star3"></label>
                <input value="2" name="rating" id="star2" type="radio">
                  <label for="star2"></label>
                <input value="1" name="rating" id="star1" type="radio">
                  <label for="star1"></label>
              </div>
              <div class="d-flex justify-content-center align-items-center button">         
							  <button class="btn btn-primary">Submit</button> 
						  </div>

              <div id="ratingMessage"></div>
          </div>

          <script>
            const ratingInputs = document.querySelectorAll('.rating input');
            const ratingMessage = document.getElementById('ratingMessage');

            ratingInputs.forEach(input => {
            input.addEventListener('click', () => {
            const ratingValue = input.value;
            let message = '';

              switch (parseInt(ratingValue)) {
                case 1:
                  message = 'Poor';
                  break;
                case 2:
                  message = 'Fair';
                  break;
                case 3:
                  message = 'Average';
                  break;
                case 4:
                  message = 'Good';
                  break;
                case 5:
                  message = 'Excellent';
                  break;
                default:
                  message = '';
              }

              ratingMessage.textContent = message;
            });
          });
          </script>
					
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <?php 
        include ('temp/footer.php');
    ?>
</body>
</html>