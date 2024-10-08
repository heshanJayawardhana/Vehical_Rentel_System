<?php

require_once '../../includes/config.php';

// Check if the submit button was pressed
if (isset($_POST['submitBtn'])) { 
    $BookingID = $_POST['BookingID'];
    $vehicleID = $_POST['vehicleID'];
    $ContactNo = $_POST['ContactNo'];
    $Destination_Purpose = $_POST['Destination_Purpose'];
    $RentalStratDate_Time = $_POST['RentalStratDate_Time'];
    $RentalEndDate_Time = $_POST['RentalEndDate_Time'];
    $NoOfMembers = $_POST['NoOfMembers'];
    $AdditionalNote = $_POST['AdditionalNote'];
    $NeedaDriver = $_POST['NeedaDriver'];
    
    

    // Ensure to use quotes around string values
    $sql = "UPDATE reservation SET
        
        vehicleID='$vehicleID',
        ContactNo='$ContactNo',
        Destination_Purpose='$Destination_Purpose',
        RentalStratDate_Time='$RentalStratDate_Time',
        RentalEndDate_Time='$RentalEndDate_Time',
        NoOfMembers='$NoOfMembers',
        AdditionalNote='$AdditionalNote',
        NeedaDriver='$NeedaDriver'
        
        
        WHERE BookingID='$BookingID'"; // Added missing semicolon here

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