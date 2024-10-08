<?php

require_once '../../includes/config.php';

// Check if the submit button was pressed
if (isset($_POST['submitBtn'])) { 
    $StaffID = $_POST['StaffID'];
    $NIC = $_POST['NIC'];
    $Bonus = $_POST['Bonus'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Age = $_POST['Age'];
    $Address = $_POST['Address'];
    $Salary = $_POST['Salary'];
    $DOB = $_POST['DOB'];
    

    // Ensure to use quotes around string values
    $sql = "UPDATE staff SET
        
        NIC='$NIC',
        Bonus='$Bonus',
        FirstName='$FirstName',
        LastName='$LastName',
        Age='$Age',
        Address='$Address',
        Salary='$Salary',
        DOB='$DOB'
        
        WHERE StaffID='$StaffID'"; // Added missing semicolon here

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