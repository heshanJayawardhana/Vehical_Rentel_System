<?php
    require '../includes/config.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Easy Ride Rentals</title>

    <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="./ContactUs.css"> <!-- Linking external CSS file -->
    <script src ="Contact.js"></script>

    <style>
        .success {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 0;
            color: darkgreen;
            background-color: lightgreen;
            border-radius: 5px;
        }

        .error {
            color: maroon;
            background-color: lightsalmon;
            border-radius: 5px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>

    <?php
        include_once "../includes/header.php";

        // session_start();

        if (isset($_SESSION['status'])) {
            if ($_SESSION['status'] == 'Insert Successful!' || $_SESSION['status'] == 'Info Updated!' || $_SESSION['status'] == 'Deleted!') {
                $class_name = 'success';
            } else {
                $class_name = 'error';
            }
        
            echo "
                <div class='$class_name'>
                    {$_SESSION['status']}
                </div>
            ";
        
            unset($_SESSION['status']);
            session_destroy();
        }
        
    ?>

    <div class="container">
        <div class="section-left">
            <h2>Contact Us..</h2>
    
            <p>
                Welcome to our contact page! If you have any questions or querise, please don't hesitate to reach out. 
                Our team is here to assist you with any concerns or inquiries you may have. We'd love to hear
                from you and help however we can!
            </p>
            <h3>Location</h3>
            <p>No:118,<br>Colombo 10<br>Sri Lanka</p>
    
            <h3>Email</h3>
            <P>easyride@gmail.com</p>
    
            <h3>Contact Number</h3>
            <p>+94703431740</p>
    
           
           
        </div>
        <div class="section-right">
        <h2>Message Us</h2>
        <div class="container-form">
            <form method="post" action="./insert.php">

            <?php
            
                // get last id from database
                $id_sql = "SELECT id FROM contact_requests ORDER BY id DESC LIMIT 1";
                $last_id_fetch = $conn -> query($id_sql);

                if ($last_id_fetch -> num_rows > 0) {
                    $last_id_result = $last_id_fetch -> fetch_assoc();
                    $last_id = $last_id_result['id'] + 1;
                } else {
                    $last_id = 1;
                }
            
            ?>
    
            <div class="group-form">
                    <label for="ID">ID</label>
                    <input type="text" value="<?php echo $last_id ?>" disabled>
                    <input type="hidden" name="ID" value="<?php echo $last_id ?>">
                </div>
                <div class="group-form">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" required>
                </div>
                <div class="group-form">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" required>
                </div>
                <div class="group-form">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="group-form">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" required>
                </div>    
                <div class="group-form">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                </div>
                <div class="sub_edit_field">
                <button type="submit" value="submit">Submit</button>
                <button type="submit" value="read"><a href="read.php" style="text-decoration: none; color:white;">Edit Feedback</button>
                </div>
                
                </form>
            </div>
        </div>
    </div>

    <?php
        include_once "../includes/footer.php";
    ?>
    
</body>
</html>

