<?php

require_once '../../includes/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Rental Form</title>

        <link rel="stylesheet" href="../CSS/formStyles.css">
</link>
</head>
<body>
    <div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <b>Enter Rental_ID:</b><br>
    <input type='number' name='RentalID' value=''><br><br>
    <b>Enter Reservation_ID:</b><br>
    <input type='number' name='ReservationID' value=''><br><br>
    <b>Enter Agent_ID:</b><br>
    <input type='number' name='AgentID' value='' ><br><br>
    <b>Enter Journey Status:</b><br>
    <select id='status' name='JourneyStatus'>
        <option value='Completed'>Completed</option>
        <option value='In Progress'>In Progress</option>
        <option value='Pending'>Pending</option>
        <option value='Cancelled'>Cancelled</option>
</select><br><br>
   
    <input type='submit' name='submitBtn' value='Save'></form></div>
    
<?php
// Check if the submit button was pressed
if (isset($_POST['submitBtn'])) { 
    $RentalID = $_POST['RentalID'];
    $ReservationID = $_POST['ReservationID'];  
    $AgentID = $_POST['AgentID']; 
    $JourneyStatus = $_POST['JourneyStatus']; 
    
   

    // Ensure to use quotes around string values
    $sql = "INSERT INTO rental(RentalID,ReservationID,AgentID,JourneyStatus)
            VALUES ('$RentalID','$ReservationID','$AgentID','$JourneyStatus')";
       
    // Execute the query
    if ($conn->query($sql)) {
        if ($conn->affected_rows > 0) {
            echo "<h1>Records inserted successfully.</h1>";
        } else {
            echo "<h1>No insertions were made to the records.</h1>";
        }
    }
    else {
        // Show detailed error message for debugging
        echo "<h1>Error, records cannot be inserted.</h1>";
         
        }

    }


$conn->close();


?>

</body>
</html>
