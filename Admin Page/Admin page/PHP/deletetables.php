<?php
require_once '../../PHP/config.php';

// Set the content type to JSON
//header('Content-Type: application/json');

// Get the JSON data
$data = json_decode(file_get_contents('php://input'), true);

//echo($data);



// Initialize the response
$response = ['status' => 'error', 'message' => 'Invalid data received.'];

// Debugging: Log the incoming JSON data
error_log(print_r($data, true)); // This will log the contents of $data to the server's error log


// Check if the required data is provided
if (!empty($data['delID']) && !empty($data['delT']) && !empty($data['deltid'])) {
    $delID = $data['delID'];     // Record ID to delete
    $delT = $data['delT'];       // Table name
    $delTid = $data['deltid'];   // Column name for condition

    // Prepare the SQL statement using prepared statements to avoid SQL injection
    $stmt = $con->prepare("DELETE FROM customer WHERE $delTid = ?");

    if ($stmt === false) {
        // If the prepared statement fails
        $response = ['status' => 'error', 'message' => 'Failed to prepare statement: ' . $con->error];
    } else {
        // Bind the parameter (assume delID is an integer, use 's' for string if needed)
        $stmt->bind_param("i", $delID); // Adjust the type ("s" for string, "i" for integer)

        // Execute the query
        if ($stmt->execute()) {
            // Check if any rows were affected
            if ($stmt->affected_rows > 0) {
                $response = ['status' => 'success', 'message' => 'Record deleted successfully.'];
            } else {
                $response = ['status' => 'error', 'message' => 'No records deleted.'];
            }
        } else {
            // If execution fails
            $response = ['status' => 'error', 'message' => 'Deletion failed: ' . $stmt->error];
        }

        // Close the statement
        $stmt->close();
    }
}

/*else{
    $response = ['status' => 'error', 'message' => 'Cannot get in: ' ];
}*/

// Return the response as JSON
echo json_encode($response);

// Close the database connection
$con->close();
?>
