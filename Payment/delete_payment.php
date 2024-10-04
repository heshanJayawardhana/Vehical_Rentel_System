<?php
include 'config.php'; // Database connection

// Get payment ID from query string
$payment_id = isset($_GET['payment_id']) ? intval($_GET['payment_id']) : 0;

if ($payment_id > 0) {
    // Prepare to delete record by ID
    $stmt = $conn->prepare("DELETE FROM payment WHERE payment_id = ?");
    
    if ($stmt) {
        $stmt->bind_param("i", $payment_id);
        
        if ($stmt->execute()) {
            // Show success message and redirect
            echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Success</title>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
                <script>
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Payment record has been deleted.',
                        icon: 'success'
                    }).then(function() {
                        window.location = 'read_payment.php'; // Redirect after deletion
                    });
                </script>
            </body>
            </html>";
        } else {
            // Show error message and redirect to read_payment.php
            echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Error</title>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
                <script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Could not delete the record. Please try again.',
                        icon: 'error'
                    }).then(function() {
                        window.location = 'read_payment.php'; // Redirect to read_payment.php
                    });
                </script>
            </body>
            </html>";
        }
        
        $stmt->close();
    } else {
        // Prepare statement failed
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Error</title>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to prepare the SQL statement.',
                    icon: 'error'
                }).then(function() {
                    window.location = 'read_payment.php'; // Redirect to read_payment.php
                });
            </script>
        </body>
        </html>";
    }
} else {
    // If no valid ID is provided, show error message and redirect to read_payment.php
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Error</title>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Invalid payment ID.',
                icon: 'error'
            }).then(function() {
                window.location = 'read_payment.php'; // Redirect to read_payment.php
            });
        </script>
    </body>
    </html>";
}
$conn->close();
?>
