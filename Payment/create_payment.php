<?php

include '../includes/config.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize input data
    $pay_id = $_POST['payment_id'];
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $method = htmlspecialchars(trim($_POST['method']));
    $totalPrice = filter_var($_POST['totalPrice'], FILTER_VALIDATE_FLOAT);
    $creditCardNum = ($method === 'card-payment') ? htmlspecialchars(trim($_POST['creditCardNum'])) : null;
    $date = ($method === 'card-payment') ? htmlspecialchars(trim($_POST['date'])) : null;
    $cvv = ($method === 'card-payment') ? htmlspecialchars(trim($_POST['cvv'])) : null;
    $receipt = ($method === 'cash-payment' && isset($_FILES['receipt'])) ? $_FILES['receipt']['name'] : null;

    // Handle file upload for receipt if the method is cash payment
    if ($method === 'cash-payment' && isset($_FILES['receipt'])) {
        $targetDir = "uploads/"; // Ensure this directory exists
        $targetFile = $targetDir . basename($_FILES['receipt']['name']);
        
        // Validate file type and size
        $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
        $fileType = mime_content_type($_FILES['receipt']['tmp_name']);
        
        if (in_array($fileType, $allowedTypes) && $_FILES['receipt']['size'] <= 5000000) { // Limit to 5MB
            if (!move_uploaded_file($_FILES['receipt']['tmp_name'], $targetFile)) {
                die('Error uploading receipt.');
            }
        } else {
            die('Invalid file type or size.');
        }
    }

    // Prepare SQL query to insert payment data
    $stmt = $conn->prepare("INSERT INTO payment ( payment_id, firstname, lastname, email, method, creditCardNum, date, cvv, receipt, totalPrice) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        error_log("Prepare failed: " . $conn->error);
        die('Database error. Please try again later.');
    }

    // Bind the parameters and execute the query
    $stmt->bind_param("issssssssd", $pay_id, $firstname, $lastname, $email, $method, $creditCardNum, $date, $cvv, $receipt, $totalPrice);

    if ($stmt->execute()) {
        // Get the ID of the last inserted record
        $last_id = $pay_id;

        // Fetch the newly inserted payment record to display it
        $result = $conn->query("SELECT * FROM payment WHERE payment_id = $last_id");
        $payment_data = $result->fetch_assoc();

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        error_log("SQL Error: " . $stmt->error); // Log the error for debugging
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'There was an issue processing your payment. Please try again.',
                    icon: 'error'
                });
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation | Easy Ride Rentals</title>
    <link rel="stylesheet" href="Payment.css"> <!-- Link to your separate CSS file -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <?php include '../includes/header.php'; ?>

    <div class="container1">
    <h2>Payment Confirmation</h2>
        <?php if (isset($payment_data)): ?>
            <div class="alert1">
                Payment has been successfully submitted!
            </div>

            <table>
                <tr>
                    <th>First Name</th>
                    <td><?php echo htmlspecialchars($payment_data['firstname']); ?></td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td><?php echo htmlspecialchars($payment_data['lastname']); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo htmlspecialchars($payment_data['email']); ?></td>
                </tr>
                <tr>
                    <th>Payment Method</th>
                    <td><?php echo htmlspecialchars($payment_data['method']); ?></td>
                </tr>
                <tr>
                    <th>Total Price</th>
                    <td><?php echo htmlspecialchars($payment_data['totalPrice']); ?></td>
                </tr>
                <?php if ($payment_data['method'] == 'card-payment'): ?>
                    <tr>
                        <th>Credit Card Number</th>
                        <td><?php echo htmlspecialchars($payment_data['creditCardNum']); ?></td>
                    </tr>
                    <tr>
                        <th>Expiry Date</th>
                        <td><?php echo htmlspecialchars($payment_data['date']); ?></td>
                    </tr>
                    <tr>
                        <th>CVV</th>
                        <td><?php echo htmlspecialchars($payment_data['cvv']); ?></td>
                    </tr>
                <?php elseif ($payment_data['method'] == 'cash-payment'): ?>
                    <tr>
                        <th>Receipt</th>
                        <td><a href="uploads/<?php echo htmlspecialchars($payment_data['receipt']); ?>" target="_blank">View Receipt</a></td>
                    </tr>
                <?php endif; ?>
            </table>

            <a href="read_payment.php" class="back_button">Back to Payment Records</a>

        <?php else: ?>
            <div class="alert2">
                Error: Payment information not available.
            </div>
        <?php endif; ?>
    </div>

    <?php include '../includes/footer.php'; ?>

</body>
</html>
