<?php
include '../includes/config.php'; // Database connection

// Initialize variables
$payment = null;

// Check if an ID is provided in the query string
if (isset($_GET['payment_id'])) {
    $payment_id = intval($_GET['payment_id']);

    // Prepare and execute the SQL statement to fetch the payment record
    $stmt = $conn->prepare("SELECT * FROM payment WHERE payment_id = ?");
    $stmt->bind_param("i", $payment_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the record exists
    if ($result->num_rows > 0) {
        $payment = $result->fetch_assoc();
    } else {
        // Handle the case where the payment record is not found
        echo "<script>alert('Payment record not found.'); window.location.href = 'read_payment.php';</script>";
        exit;
    }

    $stmt->close();
}

// Initialize success variable
$success = false;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $method = htmlspecialchars($_POST['method']);
    $totalPrice = filter_var($_POST['totalPrice'], FILTER_VALIDATE_FLOAT);
    $payment_id = intval($_POST['payment_id']); // Get the ID from the form

    // Prepare the SQL update statement
    $stmt = $conn->prepare("UPDATE payment SET firstname = ?, lastname = ?, email = ?, method = ?, totalPrice = ? WHERE payment_id = ?");
    $stmt->bind_param("ssssdi", $firstname, $lastname, $email, $method, $totalPrice, $payment_id);

    if ($stmt->execute()) {
        $success = true; // Set success to true if the query was executed
    } else {
        echo "<script>alert('There was an issue updating the payment record.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Payment | Easy Ride Rentals</title>
    <link rel="stylesheet" href="Payment.css"> <!-- Link to your separate CSS file -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <?php
        include_once "../includes/header.php";
    ?>

    <div class="container3">
        <?php if ($success): ?>
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Payment record updated successfully.',
                    icon: 'success'
                }).then(() => {
                    window.location.href = 'read_payment.php'; // Redirect after success message
                });
            </script>
        <?php else: ?>
            <div class="wrapper-form1">
            <h2>Edit Payment Record</h2>
            <form action="" method="POST">
                <input type="hidden" name="payment_id" value="<?php echo intval($payment['payment_id'] ?? 0); ?>">
                <div class="group-form">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($payment['firstname'] ?? ''); ?>" required>
                
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($payment['lastname'] ?? ''); ?>" required>
               
                
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($payment['email'] ?? ''); ?>" required>
                
                
                    <label for="method">Payment Method</label>
                    <select id="method" name="method" required>
                        <option value="card-payment" <?php echo ($payment['method'] == 'card-payment') ? 'selected' : ''; ?>>Card Payment</option>
                        <option value="cash-payment" <?php echo ($payment['method'] == 'cash-payment') ? 'selected' : ''; ?>>Cash Payment</option>
                    </select>
                
                    <label for="totalPrice">Total Price</label>
                    <input type="number" id="totalPrice" name="totalPrice" value="<?php echo htmlspecialchars($payment['totalPrice'] ?? ''); ?>"  step="0.01" min="0" required>
                </div>
                <button type="submit" class="submit-button">Update Payment</button>
            </form>
        </div>
        <?php endif; ?>
    </div>
    
    <?php
        include_once "../includes/footer.php";
    ?>

</body>
</html>
