<?php

require_once './../includes/config.php';
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
    <label>Enter Staff_ID:</label><br><br>
    <input type='text' name='StaffID' value=''><br><br>
    <label>Enter NIC:</label><br><br>
    <input type='text' name='NIC' value='' ><br><br>
    <label>Enter Bonus:</label><br><br>
    <input type='number' name='Bonus' value='' ><br><br>
    <label>Enter First Name:</label><br><br>
    <input type='text' name='FirstName' value=''><br><br>
    <label>Enter Last Name:</label><br><br>
    <input type='text' name='LastName' value=''><br><br>
    <label>Enter Age:</label><br><br>
    <input type='number' name='Age' value='' ><br><br>
    <label>Enter Address:</label><br><br>
    <textarea name='Address' value='' ></textarea><br><br>
    <label>Enter Salary:</label><br><br>
    <input type='number' name='Salary' value='' ><br><br>
    <label>Enter DOB:</label><br><br>
    <input type='date' name='DOB' value='' ><br><br>
   
    <input type='submit' name='submitBtn' value='save'></form></div>;
<?php
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
    $sql = "INSERT INTO staff(StaffID,NIC,Bonus,FirstName,LastName,Age,Address,DOB)
            VALUES ('$StaffID','$NIC','$Bonus','$FirstName','$LastName','$Age','$Address','$DOB')";
       
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
