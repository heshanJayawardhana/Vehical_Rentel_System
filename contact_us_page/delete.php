<?php

require '../includes/config.php';

// session_start();


// Check for POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Start the session
    session_start();

    $email = $_POST["user_email"];

    // Prepare the SQL statement
    $stmt = $conn->prepare("DELETE FROM contact_requests WHERE email = ?");
    
    // Bind the parameter
    $stmt->bind_param("s", $email); // Assuming email is an integer

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