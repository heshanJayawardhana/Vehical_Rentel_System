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
    <label>Enter payment_ID:</label><br><br>
    <input type='number' name='payment_id' value='' ><br><br>
    <label>Enter First Name:</label><br><br>
    <input type='text' name='firstname' value='' ><br><br>
    <label>Enter Last Name:</label><br><br>
    <input type='text' name='lastname' value='' ><br><br>
    <label>Enter Email:</label><br><br>
    <input type='email' name='email' value='' ><br><br>
    <label>Enter Method:</label><br><br>
    <input type='text' name='method' value='' ><br><br>
    <label>Enter Credit Card No:</label><br><br>
    <input type='number' name='creditCardNum' value='' ><br><br>
    <label>Enter Date:</label><br><br>
    <input type='date' name='date' value='' ><br><br>
    <label>Enter CVV:</label><br><br>
    <input type='number' name='cvv' value='' ><br><br>
    <label>Enter URL of the Receipt:</label><br><br>
    <input type='text' name='receipt' value='' ><br><br>
    <label>Enter Total Price:</label><br><br>
    <input type='number' name='totalPrice' value='' ><br><br>
    <label>Enter the Status(1/0):</label><br><br>
    <input type='number' name='confirmed' value='' ><br><br>
    
   
    <input type='submit' name='submitBtn' value='save'></form></div>
    
<?php
// Check if the submit button was pressed
if (isset($_POST['submitBtn'])) { 
    $payment_id = $_POST['payment_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $creditCardNum = $_POST['creditCardNum'];
    $date = $_POST['date'];
    $cvv = $_POST['cvv'];
    $receipt = $_POST['receipt'];
    $totalPrice = $_POST['totalPrice'];
    $confirmed = $_POST['confirmed'];
    
   
    
   

    // Ensure to use quotes around string values
    $sql = "INSERT INTO payment(payment_id,firstname,lastname,email,method,creditCardNum,date,cvv,receipt,totalPrice,confirmed)
            VALUES ('$payment_id','$firstname','$lastname','$email','$method','$creditCardNum','$date','$cvv','$receipt','$totalPrice','$confirmed')";
       
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