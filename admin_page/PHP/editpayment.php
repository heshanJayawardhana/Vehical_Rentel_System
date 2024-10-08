<?php

require_once '../../includes/config.php';

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
    $sql = "UPDATE payment SET
        
        
        firstname='$firstname',
        lastname='$lastname',
        email='$email',
        method='$method',
        creditCardNum='$creditCardNum',
        date='$date',
        cvv='$cvv',
        receipt='$receipt',
        totalPrice='$totalPrice',
        confirmed='$confirmed'

        
        
        WHERE payment_id='$payment_id'"; 

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