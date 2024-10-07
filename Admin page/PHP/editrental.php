<?php

require_once './../includes/config.php';

// Check if the submit button was pressed
if (isset($_POST['submitBtn'])) { 
    $RentalID = $_POST['RentalID'];
    $ReservationID = $_POST['ReservationID'];
    $AgentID = $_POST['AgentID'];
    $JourneyStatus = $_POST['JourneyStatus'];
    
    

    // Ensure to use quotes around string values
    $sql = "UPDATE rental SET
        
        ReservationID='$ReservationID',
        AgentID='$AgentID',
        JourneyStatus='$JourneyStatus'
        
        
        WHERE RentalID='$RentalID'"; // Added missing semicolon here

    // Execute the query
    if ($con->query($sql)) {
        if ($con->affected_rows > 0) {
            echo "<h1>Records updated successfully.</h1>";
        } else {
            echo "<h1>No changes were made to the records.</h1>";
        }
    }
    else {
        // Show detailed error message for debugging
        echo "<h1>Error, records cannot be updated.</h1>";
         echo "<p>" . $con->error . "</p>"; // Shows the MySQL error
        }

    }
else{
    echo "No update";
}

$con->close();

?>