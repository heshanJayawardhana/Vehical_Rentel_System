<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment | Easy Ride Rentals</title>
    
    
    <link rel="stylesheet" href="Payment.css"> <!-- Link to external CSS file -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <?php  include_once '../includes/header.php'; ?>
    
    <?php

        include '../includes/config.php';

        if (isset($_SESSION['type'], $_SESSION['user_id'])) {

            $user_sql = "SELECT * FROM ".$_SESSION['type']." WHERE user_id ='".$_SESSION['user_id']."' LIMIT 1";
            $user_result = $conn -> query($user_sql); 

            if ($user_result) {
                $user_data = $user_result -> fetch_assoc();
            } else {
                header('Location: ../error.html');
                exit();
            }

            $pay_sql = $conn -> query("SELECT * FROM payment ORDER BY payment_id DESC LIMIT 1");

            if ($pay_sql -> num_rows > 0) {
                $get_pay = $pay_sql -> fetch_assoc();
                $pay_id = $get_pay['payment_id'] + 1; 
            } else {
                $pay_id = 1;
            }


        } else {
            
            $_SESSION['error_message'] = 'Log In First !';
            header('Location: ../login_page/login.php'); // Redirect to your login page
            exit();
        }

    ?>

    <div class="container">
        <div class="wrapper-form">
        <h1>Payment Form</h1>
                <form action="./create_payment.php" method="post" enctype="multipart/form-data" onsubmit="confirmPayment(event)">
                    <input type="hidden" name="payment_id" value="<?php echo $pay_id ?>">
                    <div class="group-form">
                        <label for="firstname">First Name</label>
                        <input type="text" id="firstname" name="firstname" required pattern="[A-Za-z\s]+" title="Only letters and spaces allowed" value="<?php echo $user_data['first_name'] ?>">
            
                        <label for="lastname">Last Name</label>
                        <input type="text" id="lastname" name="lastname" required pattern="[A-Za-z\s]+" title="Only letters and spaces allowed" value="<?php echo $user_data['last_name'] ?>">
        
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required value="<?php echo $user_data['email'] ?>">
                        </div>
    
                        <div class="payment-method">
                        <label>Payment Method</label><br>
                        <input type="radio" id="card" name="method" value="card-payment" checked onclick="togglePaymentDetails('card')"> Card
                        <input type="radio" id="cash" name="method" value="cash-payment" onclick="togglePaymentDetails('cash')"> Cash 
                        </div>
    
                    <!-- Card Payment Details -->
                    <div id="card-details">
                        <div class="group-form">
                            <label for="creditCardNum">Credit Card Number</label>
                            <input type="text" id="creditCardNum" name="creditCardNum" maxlength="12" required pattern="\d{12}" title="Enter a 12-digit credit card number">
                        
                            <label for="date">Expiry Date (MM/YY)</label>
                            <input type="text" id="date" name="date" maxlength="5" required pattern="\d{2}/\d{2}" title="Format: MM/YY">

                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" name="cvv" maxlength="3" required pattern="\d{3}" title="Enter a 3-digit CVV">
                        </div>
                    </div>
    
                    <!-- Cash Payment Receipt -->
                    <div id="cash-details" style="display:none;">
                        <div class="group-form">
                            <label for="receipt" class="form-label">Upload Receipt</label>
                            <input type="file" class="form-control" id="receipt" name="receipt">
                        </div>
                    </div>
    
                    <div class="group-form">
                        <label for="totalPrice">Total Price</label>
                        <input type="text" id="totalPrice" name="totalPrice" required pattern="\d+(\.\d{1,2})?" title="Only numbers are allowed" value="<?php echo $_GET['amount'] ?>">
                    </div>
    
                    <button type="submit" class="submit-button">Submit Payment</button>
                </form>
        </div>
    </div>
    
    <script>
        function togglePaymentDetails(method) {
            const cardDetails = document.getElementById('card-details');
            const cashDetails = document.getElementById('cash-details');
            if (method === 'card') {
                cardDetails.style.display = 'block';
                cashDetails.style.display = 'none';
            } else {
                cardDetails.style.display = 'none';
                cashDetails.style.display = 'block';
            }
        }
    
        function confirmPayment(event) {
            event.preventDefault(); // Prevent immediate form submission
            Swal.fire({
                title: 'Confirm Payment',
                text: 'Are you sure you want to proceed with the payment?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Confirm!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit(); // Submit the form after confirmation
                }
            });
        }
    </script>
    
    <?php include_once'../includes/footer.php'; ?>

</body>
</html>



