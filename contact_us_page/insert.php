<?php

require '../includes/config.php';

// Check for POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $ID = $_POST['ID'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO contact_requests (ID, firstname, lastname, email, subject, message) VALUES (?, ?, ?, ?, ?, ?)");
    
    // Bind parameters
    $stmt->bind_param("isssss", $ID, $firstname, $lastname, $email, $subject, $message);

    session_start();

    // Execute the statement
    if ($stmt->execute()) {
        
        $_SESSION['status'] = 'Insert Successful!';
    } else {
        // echo "Error: " . $stmt->error;
        $_SESSION['status'] = $stmt->error;
    }

    // Close the statement
    $stmt->close();

    // echo "<br><button type='button'><a href='ContactUs.php' style='text-decoration: none; color:red;'>Back to Contact page</a></button>";
    header('Location: ./ContactUs.php'); // Redirect to your contact us page
    exit();
}

// Close the connection
$conn->close();

?>
