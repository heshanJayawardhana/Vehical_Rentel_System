<?php 

// connection
include '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['userEmail'];
    $pwd = $_POST['userPassword'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare('SELECT * FROM customers WHERE email = ? AND password = ?');
    $stmt->bind_param('ss', $email, $pwd);
    $stmt->execute();
    $fetch_from_customer = $stmt->get_result();

    if($fetch_from_customer->num_rows > 0) {
        // Start the session
        session_start();

        $customer_data = $fetch_from_customer->fetch_assoc();
        $_SESSION['type'] = 'customers';
        $_SESSION['user_id'] = $customer_data['user_id'];

        echo '<p>Login Succeeded!</p><h1>'.$customer_data['first_name'].' '.$customer_data['last_name'].'</h1>';
        exit();
    } else {
        // Check drivers if no customer found
        $stmt = $conn->prepare('SELECT * FROM drivers WHERE email = ? AND password = ?');
        $stmt->bind_param('ss', $email, $pwd);
        $stmt->execute();
        $fetch_from_driver = $stmt->get_result();

        if($fetch_from_driver->num_rows > 0) {
            // Start the session
            session_start();

            $driver_data = $fetch_from_driver->fetch_assoc();
            $_SESSION['type'] = 'drivers';
            $_SESSION['user_id'] = $driver_data['user_id'];

            echo '<p>Login Succeeded!</p><h1>'.$driver_data['first_name'].' '.$driver_data['last_name'].'</h1>';
            exit();
        }
    }

    // Set error message in session
    session_start();
    $_SESSION['error_message'] = 'Invalid email or password.';
    header('Location: ./login.php'); // Redirect to your login page
    exit();
}

// close connection
include '../includes/closecon.php';
?>
