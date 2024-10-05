<?php
    require '../includes/config.php';

// Check for POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Start the session
    session_start();

    // Assuming the necessary data is obtained from the POST request
    $ID = $_POST["ID"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Prepare the SQL statement
    $stmt = $conn->prepare("UPDATE contact_requests SET firstname = ?, lastname = ?, email = ?, subject = ?, message = ? WHERE ID = ?");

    // Bind parameters
    $stmt->bind_param("sssssi", $firstname, $lastname, $email, $subject, $message, $ID); // Assuming ID is an integer

    // Execute the statement
    try {
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $_SESSION['status'] = 'Info Updated!';
            } else {
                // No rows affected, meaning the ID might be wrong
                $_SESSION['status'] = 'No record found with the given ID!';
            }
        }
    } catch (mysqli_sql_exception $e) {
        // Capture the error message and set the session status
        $_SESSION['status'] = 'Something went wrong! Error: ' . $e->getMessage();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect to your contact us page
    header('Location: ./ContactUs.php');
    exit();
}


header('Location: ./ContactUs.php'); // Redirect to your contact us page
exit();

?>