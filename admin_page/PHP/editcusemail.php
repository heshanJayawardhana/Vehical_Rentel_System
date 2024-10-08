<?php

require_once '../../includes/config.php';

// Check if the submit button was pressed
if (isset($_POST['submitBtn'])) { 
    $CID = $_POST['CID'];
    $Email = $_POST['Email'];
    
    
    

    // Ensure to use quotes around string values
    $sql = "UPDATE cusemail SET
        
        
        Email='$Email'
        
        
        WHERE CID='$CID'"; 

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