<?php

require_once './../includes/config.php';

// Check if the submit button was pressed
if (isset($_POST['submitBtn'])) { 
    $AgentID = $_POST['AgentID'];
    $StaffID = $_POST['StaffID'];
    
    
    

    // Ensure to use quotes around string values
    $sql = "UPDATE rentalagent SET
        
        
        StaffID='$StaffID'
        
        
        WHERE AgentID='$AgentID'"; 

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