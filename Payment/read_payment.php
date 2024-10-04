<?php
    include '../includes/config.php'; // Database connection

// Fetch all payment records
$result = $conn->query("SELECT * FROM payment");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Payments</title>
    <link rel="stylesheet" href="Payment.css"> <!-- Link to your separate CSS file -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <?php
        include_once '../includes/header.php'; // Database connection
    ?>

    <div class="container2">
        <table class="payment-table">
        <h2>Payment Records</h2>
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Method</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['payment_id']; ?></td>
                        <td><?php echo htmlspecialchars($row['firstname'] . ' ' . $row['lastname']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['method']); ?></td>
                        <td><?php echo htmlspecialchars($row['totalPrice']); ?></td>
                        <td>
                            <a href="edit_payment.php?payment_id=<?php echo $row['payment_id']; ?>" class="edit-button">Edit</a>
                            <button class="delete-button" onclick="deletePayment(<?php echo $row['payment_id']; ?>)">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <!-- Add the button to redirect to payment.php -->
        <div class="center">
            <a href="Payment.php" class="add-button">Add New Payment</a>
        </div>
    </div>

    <script>
        function deletePayment(payment_id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this record!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'delete_payment.php?payment_id=' + payment_id;
                }
            });
        }
    </script>

    <?php
        include_once '../includes/footer.php'; // Database connection
    ?>

</body>
</html>
