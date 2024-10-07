<?php

require_once './../includes/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Reservation Form</title>

        <link rel="stylesheet" href="../CSS/formStyles.css">
</link>
</head>
<body>
    <div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label>Enter Booking_ID:</label><br><br>
    <input type='number' name='BookingID' value='' ><br><br>
    <label>Enter Vehicle_ID:</label><br><br>
    <input type='number' name='vehicleID' value='' ><br><br>
    <label>Enter ContactNo:</label><br><br>
    <input type='tel' name='ContactNo' value='' ><br><br>
    <label>Enter Destination Purpose:</label><br><br>
    <input type='text' name='Destination_Purpose' value='' ><br><br>
    <label>Enter Start Date and Time:</label><br><br>
    <input type='datetime-local' name='RentalStratDate_Time' value='' ><br><br>
    <label>Enter End Date and Time:</label><br><br>
    <input type='datetime-local' name='RentalEndDate_Time' value='' ><br><br>
    <label>Enter No Of Members:</label><br><br>
    <input type='number' name='NoOfMembers' value='' ><br><br>
    <label>Enter Additional Note:</label><br><br>
    <textarea name='AdditionalNote' value='' ></textarea><br><br>
    <label>Driver Requirement:</label><br><br>
    <select name='NeedaDriver' ><br><br>
    <option value='Yes'>Yes</option>
    <option value='No'>No</option>
    </select>

   
    <input type='submit' name='submitBtn' value='save'></form></div>
<?php
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
    $sql = "INSERT INTO reservation(BookingID,vehicleID,ContactNo,Destination_Purpose,RentalStratDate_Time,RentalEndDate_Time,NoOfMembers,AdditionalNote,NeedaDriver)
            VALUES ('$BookingID','$vehicleID','$ContactNo','$Destination_Purpose','$RentalStratDate_Time','$RentalEndDate_Time','$NoOfMembers','$AdditionalNote','$NeedaDriver')";
       
    // Execute the query
    if ($con->query($sql)) {
        if ($con->affected_rows > 0) {
            echo "<h1>Records inserted successfully.</h1>";
        } else {
            echo "<h1>No insertions were made to the records.</h1>";
        }
    }
    else {
        // Show detailed error message for debugging
        echo "<h1>Error, records cannot be inserted.</h1>";
         echo "<p>" . $con->error . "</p>"; // Shows the MySQL error
        }

    }


$con->close();


?>

</body>
</html>
