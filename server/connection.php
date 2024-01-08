<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "wellcity_db";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);
    
    // Check connection
    if ($conn->connect_errno > 0) 
    {
	    die("UNABLE TO CONNECT SERVER: [".$conn->connect_error."]");
    }
?>