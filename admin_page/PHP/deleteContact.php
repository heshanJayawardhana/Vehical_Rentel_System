<?php
require_once '../../includes/config.php';



$id=$_GET['id'];



if ($id) {
    // Display the query for debugging purposes
    $sql = "DELETE FROM contact_requests WHERE id=$id";
    

    // Execute the query
    if ($conn->query($sql)) {
        if ($conn->affected_rows > 0) {
            echo "<h1>Records deleted successfully.</h1>";
        } else {
            echo "<h1>No records were found to delete.</h1>";
        }
    } else {
        // Show detailed error message from MySQL
        echo "<h1>Error, records cannot be deleted.</h1>";
        echo "<p>MySQL Error: " . $conn->error . "</p>";
    }
} else {
    echo "<h1>Invalid or missing DID parameter.</h1>";
}

// Close the connection
$conn->close();
?>
