<?php

require_once './../includes/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Rental Agent Form</title>

        <link rel="stylesheet" href="../CSS/formStyles.css">
</link>
</head>
<body>
    <div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label>Enter Agent_ID:</label><br><br>
    <input type='number' name='AgentID' value='' ><br><br>
    <label>Enter Staff_ID:</label><br><br>
    <input type='number' name='StaffID' value='' ><br><br>
   
   
    <input type='submit' name='submitBtn' value='save'></form></div>
<?php
// Check if the submit button was pressed
if (isset($_POST['submitBtn'])) { 
    $AgentID = $_POST['AgentID'];
    $StaffID = $_POST['StaffID'];  
    
   

    // Ensure to use quotes around string values
    $sql = "INSERT INTO rentalagent(AgentID,StaffID)
            VALUES ('$AgentID','$StaffID')";
       
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