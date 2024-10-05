<?php

require '../includes/config.php';

session_start();


// Check for POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Start the session
    session_start();

    $ID = $_POST["ID"];

    // Prepare the SQL statement
    $stmt = $conn->prepare("DELETE FROM contact_requests WHERE ID = ?");
    
    // Bind the parameter
    $stmt->bind_param("i", $ID); // Assuming ID is an integer

    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['status'] = "Deleted!";
    } else {
        $_SESSION['status'] = "Not Successful!";
    }

    // Close the statement
    $stmt->close();
    
    // Close the connection
    $conn->close();

    // Redirect to your contact us page
    header('Location: ./ContactUs.php');
    exit();
}


?>