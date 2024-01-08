<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel = "stylesheet" href="temp/style.css">
      <title>navbar</title></title>
</head>
<body>
            <nav class = "navigation_bar">
                <a href="profile.php"> <img src="res/unknown profile.png" alt="profile icon" class="profile_avatar" id="navbarProfilePic"> </a>
                <a href = "monitor.php" style="margin-top: 10px;"> Monitor </a>
                <a href = "../maps/index.php" style="margin-top: 10px;"> Nearby Hospital </a>
                <a href = "records.php" style="margin-top: 10px;"> Records </a>
                <a href = "appointment.php" style="margin-top: 10px;"> Appointment </a>  
                <div class= "logo"><a href = "homepage.php"> <img src ="res/WELL CITY LOGO.png" alt="well city logo" class = "logo" >  </a></div>
            </nav>

        <script>
            // Function to load profile information from localStorage when the page is loaded
            window.onload = function () {
                const storedProfilePic = localStorage.getItem('profilePic');
                const profilePicInNavbar = document.getElementById('navbarProfilePic');

                if (storedProfilePic && profilePicInNavbar) {
                    // Update the profile picture in the navigation bar
                    profilePicInNavbar.src = storedProfilePic;
                }
            };
        </script>
</body>
</html>