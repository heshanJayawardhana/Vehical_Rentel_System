<?php  include_once '../includes/header.php'; ?>

<link rel="stylesheet" href="Payment.css"> <!-- Link to external CSS file -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<div class="container">
    <div class="wrapper-form">
    <h1>Payment Form</h1>
            <form action="create_payment.php" method="post" enctype="multipart/form-data" onsubmit="confirmPayment(event)">
                <div class="group-form">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" required pattern="[A-Za-z\s]+" title="Only letters and spaces allowed">
        
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" required pattern="[A-Za-z\s]+" title="Only letters and spaces allowed">
    
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
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
                        <input type="text" id="creditCardNum" name="creditCardNum" maxlength="8" required pattern="\d{8}" title="Enter a 8-digit credit card number">
                    
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
                    <input type="text" id="totalPrice" name="totalPrice" required pattern="\d+(\.\d{1,2})?" title="Only numbers are allowed">
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

