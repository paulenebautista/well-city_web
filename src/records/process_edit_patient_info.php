<?php
// process_edit_patient_info.php

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if "id" is set in the POST array
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $fname = $_POST["fname"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        $address = $_POST["address"];
        $pnum = $_POST["pnum"];
        $ecn = $_POST["ecn"];
        $relationship = $_POST["relationship"];
        $ecpnum = $_POST["ecpnum"];

        // Update the record in the database
        $updateQuery = "UPDATE tbl_records_patient_information 
                        SET fname='$fname', dob='$dob', gender='$gender', 
                        address='$address', pnum='$pnum', ecn='$ecn', 
                        relationship='$relationship', ecpnum='$ecpnum' 
                        WHERE id=$id";

        if ($conn->query($updateQuery) === TRUE) {
            // Redirect back to the edit page or any other appropriate page
            header("Location: records_edit.php?id=$id");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "ID is not set in the POST array.";
    }
}

// Close the database connection
$conn->close();
?>
