<?php

require_once '../../includes/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Branch Contact Form</title>

        <link rel="stylesheet" href="../CSS/formStyles.css">
</link>
</head>
<body>
    <div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label>Enter Branch_ID:</label><br><br>
    <input type='number' name='BranchID' value=''><br><br>
    <label>Enter Tel No:</label><br><br>
    <input type='tel' name='Telno' value='' pattern='[0-9]{10}'><br><br>
   
   
    <input type='submit' name='submitBtn' value='save'></form></div>
    
<?php
// Check if the submit button was pressed
if (isset($_POST['submitBtn'])) { 
    $BranchID = $_POST['BranchID'];
    $Telno = $_POST['Telno'];  
    
   

    // Ensure to use quotes around string values
    $sql = "INSERT INTO branchcontact(BranchID,Telno)
            VALUES ('$BranchID','$Telno')";
       
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
         echo "<p>" . $conn->error . "</p>"; // Shows the MySQL error
        }

    }


$conn->close();


?>

</body>
</html>
