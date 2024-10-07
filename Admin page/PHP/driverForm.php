<?php

require_once './../includes/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Driver Form</title>

        <link rel="stylesheet" href="../CSS/formStyles.css">
</link>
</head>
<body>
    <div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label>Enter Driver_ID:</label><br><br>
    <input type='text' name='DID' value='' ><br><br>
    <label>Enter Staff_ID:</label><br><br>
    <input type='number' name='SID' value='' ><br><br>
    <label>Enter Licence No:</label><br><br>
    <input type='text' name='LicenseNo' value=''><br><br>
    
   
    <input type='submit' name='submitBtn' value='save'></form></div>
<?php
// Check if the submit button was pressed
if (isset($_POST['submitBtn'])) { 
    $DID = $_POST['DID'];
    $SID = $_POST['SID'];
    $LicenseNo = $_POST['LicenseNo'];
   
    
   

    // Ensure to use quotes around string values
    $sql = "INSERT INTO driver(DID,SID,LicenseNo)
            VALUES ('$DID','$SID','$LicenseNo')";
       
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
