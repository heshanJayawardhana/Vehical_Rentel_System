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
    <label>Enter Request_ID:</label><br><br>
    <input type='number' name='id' value='' ><br><br>
    <label>Enter First Name:</label><br><br>
    <input type='text' name='firstname' value='' ><br><br>
    <label>Enter Last Name:</label><br><br>
    <input type='text' name='lastname' value='' ><br><br>
    <label>Enter Email Address:</label><br><br>
    <input type='email' name='email' value='' ><br><br>
    <label>Enter Message:</label><br><br>
    <textarea name='message' value='' ></textarea><br><br>
    
   
    <input type='submit' name='submitBtn' value='save'></form></div>
    
<?php
// Check if the submit button was pressed
if (isset($_POST['submitBtn'])) { 
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
   
    
   

    // Ensure to use quotes around string values
    $sql = "INSERT INTO contact_requests(id,firstname,lastname,email,message)
            VALUES ('$id','$firstname','$lastname','$email',$message')";
       
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