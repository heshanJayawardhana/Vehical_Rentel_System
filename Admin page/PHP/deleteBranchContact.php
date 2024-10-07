<?php
require_once './../includes/config.php';



$BranchID=$_GET['BranchID'];
$Telno=$_GET['Telno'];


if ($BranchID && $Telno) {
    // Display the query for debugging purposes
    $sql = "DELETE FROM branchcontact WHERE BranchID=$BranchID AND Telno='$Telno'";
    

    // Execute the query
    if ($con->query($sql)) {
        if ($con->affected_rows > 0) {
            echo "<h1>Records deleted successfully.</h1>";
        } else {
            echo "<h1>No records were found to delete.</h1>";
        }
    } else {
        // Show detailed error message from MySQL
        echo "<h1>Error, records cannot be deleted.</h1>";
        echo "<p>MySQL Error: " . $con->error . "</p>";
    }
} else {
    echo "<h1>Invalid or missing DID parameter.</h1>";
}

// Close the connection
$con->close();
?>
