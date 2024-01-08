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
        $toa = mysqli_real_escape_string($conn, $_POST["toa"]);
        $sev = mysqli_real_escape_string($conn, $_POST["sev"]);
        $conName = mysqli_real_escape_string($conn, $_POST["conName"]);
        $dDiag = mysqli_real_escape_string($conn, $_POST["dDiag"]);
        $surgName = mysqli_real_escape_string($conn, $_POST["surgName"]);
        $dSurg = mysqli_real_escape_string($conn, $_POST["dSurg"]);
        $famMem = mysqli_real_escape_string($conn, $_POST["famMem"]);
        $medCon = mysqli_real_escape_string($conn, $_POST["medCon"]);

        // Update the record in the database
        $updateQuery = "UPDATE tbl_records_patient_information 
                        SET toa='$toa', sev='$sev', conName='$conName', 
                        dDiag='$dDiag', surgName='$surgName', dSurg='$dSurg', 
                        famMem='$famMem', medCon='$medCon' 
                        WHERE id=$id";

        if ($conn->query($updateQuery) === TRUE) {
            // Redirect back to the edit page or any other appropriate page
            header("Location: records_edit.php?id=$id&success=true");
            exit();
        } else {
            echo "Error updating medical history: " . $conn->error;
        }
    } else {
        echo "ID is not set in the POST array.";
    }
}

// Close the database connection
$conn->close();
?>
