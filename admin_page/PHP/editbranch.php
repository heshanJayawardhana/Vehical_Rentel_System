<?php

require_once '../../includes/config.php';

// Check if the submit button was pressed
if (isset($_POST['submitBtn'])) { 
    $BranchID = $_POST['BranchID'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];
    $Location = $_POST['Location'];
    
    

    // Ensure to use quotes around string values
    $sql = "UPDATE branch SET
        
        Email='$Email',
        Address='$Address',
        Location='$Location'
        
        
        WHERE BranchID='$BranchID'"; 

    // Execute the query
    if ($conn->query($sql)) {
        if ($conn->affected_rows > 0) {
            echo "<h1>Records updated successfully.</h1>";
        } else {
            echo "<h1>No changes were made to the records.</h1>";
        }
    }
    else {
        // Show detailed error message for debugging
        echo "<h1>Error, records cannot be updated.</h1>";
         echo "<p>" . $conn->error . "</p>"; // Shows the MySQL error
        }

    }
else{
    echo "No update";
}

$conn->close();

?>