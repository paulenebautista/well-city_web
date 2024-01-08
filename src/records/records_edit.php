<?php
// edit.php

// Database Connection (similar to your existing connection code)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wellcity_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Retrieve the record based on ID
    $selectQuery = "SELECT * FROM tbl_records_patient_information WHERE id = $id";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Now, use $row to pre-fill the form fields for editing
    } else {
        echo "Record not found.";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <!-- Add any necessary CSS or script links here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding-top: 70px; /* Adjust this value based on your header height */
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #2C4B24;
            color: #ffffff;
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="fixed-header">
        <?php include('temp/header.php'); ?>
    </div>

    <h1>Edit Record</h1>
    <!-- Patient Information Form -->
    <div class="container">
        <form action="process_edit_patient_info.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="fname">Full Name</label>
            <input type="text" id="fname" name="fname" value="<?php echo $row['fname']; ?>" required>

            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob" value="<?php echo $row['dob']; ?>" required>

            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="male" <?php echo ($row['gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
                <option value="female" <?php echo ($row['gender'] == 'female') ? 'selected' : ''; ?>>Female</option>
                <option value="other" <?php echo ($row['gender'] == 'other') ? 'selected' : ''; ?>>Other</option>
            </select>

            <label for="address">Address</label>
            <textarea id="address" name="address" rows="3" required><?php echo $row['address']; ?></textarea>

            <label for="pnum">Phone Number</label>
            <input type="tel" id="pnum" name="pnum" value="<?php echo $row['pnum']; ?>" required>

            <h5>Emergency Contact Information:</h5>
            <label for="ecn">Emergency Contact Name</label>
            <input type="text" id="ecn" name="ecn" value="<?php echo $row['ecn']; ?>" required>

            <label for="relationship">Relationship</label>
            <input type="text" id="relationship" name="relationship" value="<?php echo $row['relationship']; ?>" required>

            <label for="ecpnum">Emergency Contact Phone Number</label>
            <input type="tel" id="ecpnum" name="ecpnum" value="<?php echo $row['ecpnum']; ?>" required>

            <input type="submit" value="Save Changes">
        </form>
    </div>

    <!-- Medical History Section -->
    <div class="container mt-5">
        <form action="process_edit_medical_history.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="toa">Type of Allergy</label>
            <input type="text" id="toa" name="toa" value="<?php echo $row['toa']; ?>">

            <label for="sev">Severity</label>
            <input type="text" id="sev" name="sev" value="<?php echo $row['sev']; ?>">

            <label for="conName">Condition Name</label>
            <input type="text" id="conName" name="conName" value="<?php echo $row['conName']; ?>">

            <label for="dDiag">Date Diagnosed</label>
            <input type="date" id="dDiag" name="dDiag" value="<?php echo $row['dDiag']; ?>">

            <label for="surgName">Surgery Name</label>
            <input type="text" id="surgName" name="surgName" value="<?php echo $row['surgName']; ?>">

            <label for="dSurg">Date of Surgery</label>
            <input type="date" id="dSurg" name="dSurg" value="<?php echo $row['dSurg']; ?>">

            <label for="famMem">Family Member</label>
            <input type="text" id="famMem" name="famMem" value="<?php echo $row['famMem']; ?>">

            <label for="medCon">Medical Condition</label>
            <input type="text" id="medCon" name="medCon" value="<?php echo $row['medCon']; ?>">

            <input type="submit" value="Save Changes">
        </form>
    </div>

    <!-- Vital Signs Section -->
    <div class="container mt-5">
        <form action="process_edit_vital_signs.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="systolicBP">Systolic Blood Pressure</label>
            <input type="number" id="systolicBP" name="systolicBP" value="<?php echo $row['systolicBP']; ?>">

            <label for="diastolicBP">Diastolic Blood Pressure</label>
            <input type="number" id="diastolicBP" name="diastolicBP" value="<?php echo $row['diastolicBP']; ?>">

            <label for="hRate">Heart Rate</label>
            <input type="number" id="hRate" name="hRate" value="<?php echo $row['hRate']; ?>">

            <label for="resRate">Respiratory Rate</label>
            <input type="number" id="resRate" name="resRate" value="<?php echo $row['resRate']; ?>">

            <label for="bodTemp">Body Temperature</label>
            <input type="number" id="bodTemp" name="bodTemp" value="<?php echo $row['bodTemp']; ?>">

            <input type="submit" value="Save Changes">
        </form>
    </div>

    <div class="container mt-3">
        <form id="submitForm" action="records.php" method="get">
        <input type="submit" class="btn btn-custom-color mx-auto d-grid gap-2 col-6 fw-bold" value="Submit" name="submit">
        </form>
    </div>

    <?php include ('temp/footer.php'); ?>

</body>
</html>
