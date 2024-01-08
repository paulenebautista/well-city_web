<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    function closeModal() {
        // Close the modal
        $('#successModal').modal('hide');

        // Redirect to the records page
        window.location.href = 'records.php'; // Update the URL if needed
    }
    </script>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>

    <title>Records</title>
    <style>
        body {
            padding-top: 70px; /* Adjust this value based on your header height */
        }

        .fixed-header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000; /* Make sure it's above other elements */
        }

        .btn-custom-color {
            background-color: #2C4B24;
            color: #ffffff; 
            border-radius: 15px;
        }
    </style>
</head>
<body>
    <div class="fixed-header">
        <?php include('../../temp/header.php'); ?>
    </div>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title fw-bold mb-0">Patient Information</h3>
            </div>
            <div class="card-body">
                <!-- Patient Information Section -->
                <form action="records.php" method="post">
                    <div class="mb-3">
                        <label for="fname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" required>
                    </div>

                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>

                <div class="mb-4">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <!-- Contact Information Section -->
                <h5>Contact Information:</h5>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="pnum" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="pnum" name="pnum" required>
                </div>

                <!-- Emergency Contact Information Section -->
                <h5>Emergency Contact Information:</h5>
                <div class="mb-3">
                    <label for="ecn" class="form-label">Emergency Contact Name</label>
                    <input type="text" class="form-control" id="ecn" name="ecn" required>
                </div>

                <div class="mb-3">
                    <label for="relationship" class="form-label">Relationship</label>
                    <input type="text" class="form-control" id="relationship" name="relationship" required>
                </div>

                    <div class="mb-3">
                        <label for="ecpnum" class="form-label">Emergency Contact Phone Number</label>
                        <input type="tel" class="form-control" id="ecpnum" name="ecpnum" required>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Medical History Section -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title fw-bold mb-0">Medical History</h3>
            </div>
            <div class="card-body">
        
                <!-- Allergies -->
                <div class="mb-3">
                    <label for="toa" class="form-label">Type of Allergy</label>
                    <input type="text" class="form-control" id="toa" name="toa">
                </div>

                <div class="mb-3">
                    <label for="sev" class="form-label">Severity</label>
                    <input type="text" class="form-control" id="sev" name="sev">
                </div>

                <!-- Chronic Conditions -->
                <div class="mb-3">
                    <label for="conName" class="form-label">Condition Name</label>
                    <input type="text" class="form-control" id="conName" name="conName">
                </div>

                <div class="mb-3">
                    <label for="dDiag" class="form-label">Date Diagnosed</label>
                    <input type="date" class="form-control" id="dDiag" name="dDiag">
                </div>

                <!-- Previous Surgeries -->
                <div class="mb-3">
                    <label for="surgName" class="form-label">Surgery Name</label>
                    <input type="text" class="form-control" id="surgName" name="surgName">
                </div>

                <div class="mb-3">
                    <label for="dSurg" class="form-label">Date of Surgery</label>
                    <input type="date" class="form-control" id="dSurg" name="dSurg">
                </div>

                <!-- Family Medical History -->
                <div class="mb-3">
                    <label for="famMem" class="form-label">Family Member</label>
                    <input type="text" class="form-control" id="famMem" name="famMem">
                </div>

                <div class="mb-3">
                    <label for="medCon" class="form-label">Medical Condition</label>
                    <input type="text" class="form-control" id="medCon" name="medCon">
                </div>
            </div>
        </div>
    </div>

    <!-- Vital Signs Section -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title fw-bold mb-0">Vital Signs</h3>
            </div>
            <div class="card-body">
              
                <!-- Blood Pressure -->
                <div class="mb-3">
                    <label for="systolicBP" class="form-label">Systolic Blood Pressure</label>
                    <input type="number" class="form-control" id="systolicBP" name="systolicBP">
                </div>

                <div class="mb-3">
                    <label for="diastolicBP" class="form-label">Diastolic Blood Pressure</label>
                    <input type="number" class="form-control" id="diastolicBP" name="diastolicBP">
                </div>

                <!-- Heart Rate -->
                <div class="mb-3">
                    <label for="hRate" class="form-label">Heart Rate</label>
                    <input type="number" class="form-control" id="hRate" name="hRate">
                </div>

                <!-- Respiratory Rate -->
                <div class="mb-3">
                    <label for="resRate" class="form-label">Respiratory Rate</label>
                    <input type="number" class="form-control" id="resRate" name="resRate">
                </div>

                <!-- Body Temperature -->
                <div class="mb-3">
                    <label for="bodTemp" class="form-label">Body Temperature</label>
                    <input type="number" class="form-control" id="bodTemp" name="bodTemp">
                </div>
            </div>
        </div>
    </div>
    
    <div class="container mt-3">
        <input type="submit" class="btn btn-custom-color mx-auto d-grid gap-2 col-6 fw-bold" value="Submit" name="submit">
    </form>
    </div>

<!-- Display Existing Records (Read) -->
<div class="container mt-5">
    <h3 class="fw-bold">Existing Records</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Date of Birth</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database Connection
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

            // Display existing records
            $selectQuery = "SELECT * FROM tbl_records_patient_information";
            $result = $conn->query($selectQuery);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['fname']}</td>
                            <td>{$row['dob']}</td>
                            <td>
                                <a href='records_edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='records_delete.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirmDelete()'>Delete</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No records found</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

    <!-- Bootstrap Modal for Success Message -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Record added successfully!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Close</button>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php 
    include ('temp/footer.php');
?>

<?php
// Database Connection
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Get form data for Patient Information
    $fname = $_POST["fname"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $pnum = $_POST["pnum"];
    $ecn = $_POST["ecn"];
    $relationship = $_POST["relationship"];
    $ecpnum = $_POST["ecpnum"];

    // Get form data for Medical History
    $toa = $_POST["toa"];
    $sev = $_POST["sev"];
    $conName = $_POST["conName"];
    $dDiag = $_POST["dDiag"];
    $surgName = $_POST["surgName"];
    $dSurg = $_POST["dSurg"];
    $famMem = $_POST["famMem"];
    $medCon = $_POST["medCon"];

    // Get form data for Vital Signs
    $systolicBP = $_POST["systolicBP"];
    $diastolicBP = $_POST["diastolicBP"];
    $hRate = $_POST["hRate"];
    $resRate = $_POST["resRate"];
    $bodTemp = $_POST["bodTemp"];

    // SQL query to insert data into the database
    $sql = "INSERT INTO tbl_records_patient_information (fname, dob, gender, address, pnum, ecn, relationship, ecpnum,
            toa, sev, conName, dDiag, surgName, dSurg, famMem, medCon,
            systolicBP, diastolicBP, hRate, resRate, bodTemp) 
            VALUES ('$fname', '$dob', '$gender', '$address', '$pnum', '$ecn', '$relationship', '$ecpnum',
            '$toa', '$sev', '$conName', '$dDiag', '$surgName', '$dSurg', '$famMem', '$medCon',
            '$systolicBP', '$diastolicBP', '$hRate', '$resRate', '$bodTemp')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Open the success modal using JavaScript
        echo '<script type="text/javascript">
                $(document).ready(function(){
                    $("#successModal").modal("show");
                });
            </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
</body>
</html>