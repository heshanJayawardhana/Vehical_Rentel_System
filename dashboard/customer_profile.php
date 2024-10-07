<?php 
include '../includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> | Profile | Easy Ride Rentals</title>
    <link rel="stylesheet" href="./styles/customerStyle.css">
</head>
<body>

<?php

include '../includes/header.php';

?>

    <div class="frame">
        <div class="subframe">
            <a href="">Past Activity</a>
            <a href="">Current Activity</a>
            <a href="">Favourite Rides</a>
            <a href="">Favourite Drivers</a>
            <a href="">Payment</a>
            <a href="../dashboard/update_customer.php">Settings</a>
        </div>
        <div class="subframe">

        <?php

        $user_sql = "SELECT * FROM customers WHERE user_id = '" . $_SESSION['user_id'] . "'";
        $user_query = $conn->query($user_sql); // Corrected to use $user_sql

        if ($user_query->num_rows > 0) {
            $user = $user_query->fetch_assoc();
        } else {
            echo 'Internal Error!';
        }

        ?>


            <div class="mini_frame">
                <img src="<?php echo $user['profile_image'] ?>" alt="profile_image">
                <div class="data">
                    <h3><?php echo $user['first_name'].' '.$user['last_name'] ?></h3>
                    <p><?php echo $user['email'] ?></p>
                    <p><?php echo $user['address'] ?></p>
                    <p><?php echo $user['mobile'] ?></p>
                </div>
            </div>
            
        </div>
    </div>


<?php

include '../includes/footer.php';

?>

</body>
</html>