<?php

require_once './../includes/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Branch Form</title>

        <link rel="stylesheet" href="../CSS/formStyles.css">
</link>
</head>
<body>
    <div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label>Enter Branch_ID:</label><br><br>
    <input type='number' name='BranchID' value='' ><br><br>
    <label>Enter Email:</label><br><br>
    <input type='email' name='Email' value='' ><br><br>
    <label>Enter Address:</label><br><br>
    <textarea name='Address' value='' ></textarea><br><br>
    <label>Enter Location:</label><br><br>
    <input type='text' name='Location' value='' ><br><br>
    
   
    <input type='submit' name='submitBtn' value='save'></form></div>
<?php
// Check if the submit button was pressed
if (isset($_POST['submitBtn'])) { 
    $BranchID = $_POST['BranchID'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];
    $Location = $_POST['Location'];
   
    
   

    // Ensure to use quotes around string values
    $sql = "INSERT INTO branch(BranchID,Email,Address,Location)
            VALUES ('$BranchID','$Email','$Address','$Location')";
       
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
