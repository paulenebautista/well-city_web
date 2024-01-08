<?php

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
        // Validate and sanitize input data
        $id = intval($_POST["id"]);
        $systolicBP = intval($_POST["systolicBP"]);
        $diastolicBP = intval($_POST["diastolicBP"]);
        $hRate = intval($_POST["hRate"]);
        $resRate = intval($_POST["resRate"]);
        $bodTemp = floatval($_POST["bodTemp"]);

        // Update the record in the database
        $updateQuery = "UPDATE tbl_records_patient_information 
                        SET systolicBP=$systolicBP, diastolicBP=$diastolicBP, 
                        hRate=$hRate, resRate=$resRate, bodTemp=$bodTemp 
                        WHERE id=$id";

        if ($conn->query($updateQuery) === TRUE) {
            // Redirect back to the edit page or any other appropriate page
            header("Location: records_edit.php?id=$id&success=true");
            exit();
        } else {
            echo "Error updating vital signs: " . $conn->error;
        }
    } else {
        echo "ID is not set in the POST array.";
    }
}

// Close the database connection
$conn->close();
?>
