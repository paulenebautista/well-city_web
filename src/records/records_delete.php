<?php
// delete.php

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

    // Check if the user confirmed the deletion
    if (isset($_GET["confirm"]) && $_GET["confirm"] == "true") {
        // Delete the record based on ID
        $deleteQuery = "DELETE FROM tbl_records_patient_information WHERE id = $id";

        if ($conn->query($deleteQuery) === TRUE) {
            // Redirect back to the records page or show a success message
            header("Location: records.php");
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        // Display a confirmation message with a link to delete.php with confirm=true
        echo "<h3>Are you sure you want to delete this record?</h3>";
        echo "<a href='delete.php?id=$id&confirm=true' class='btn btn-danger'>Yes, delete</a>";
        echo " <a href='records.php' class='btn btn-secondary'>No, go back</a>";
    }

    // Delete the record based on ID
    $deleteQuery = "DELETE FROM tbl_records_patient_information WHERE id = $id";

    if ($conn->query($deleteQuery) === TRUE) {
        // Redirect back to the records page or show a success message
        header("Location: records.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
