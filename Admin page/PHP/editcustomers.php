<?php

require_once './../includes/config.php';

// Check if the submit button was pressed
if (isset($_POST['submitBtn'])) { 
    $id = $_POST['user_id'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $dob = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $nic = $_POST['nic_number'];
    $licno = $_POST['licence_number'];
    $address = $_POST['address'];
    $mob = $_POST['mobile'];
    $email = $_POST['email'];
    $nic_pdf = $_POST['nic_pdf'];
    $prof_img = $_POST['profile_image'];
    $pw = $_POST['password'];
    $create = $_POST['created_at'];

    // Ensure to use quotes around string values
    $sql = "UPDATE customers SET
        first_name='$fname',
        last_name='$lname',
        date_of_birth='$dob',
        gender='$gender',
        nic_number='$nic',
        licence_number='$licno',
        address='$address',
        mobile='$mob',
        email='$email',
        nic_pdf='$nic_pdf',
        profile_image='$prof_img',
        password='$pw',
        created_at='$create'
        WHERE user_id='$id'"; 

    // Execute the query
    if ($con->query($sql)) {
        if ($con->affected_rows > 0) {
            echo "<h1>Records updated successfully.</h1>";
        } else {
            echo "<h1>No changes were made to the records.</h1>";
        }
    }
    else {
        // Show detailed error message for debugging
        echo "<h1>Error, records cannot be updated.</h1>";
         echo "<p>" . $con->error . "</p>"; // Shows the MySQL error
        }

    }
else{
    echo "No update";
}

$con->close();

?>