<?php

require_once '../../includes/config.php';



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
    $sql = "INSERT INTO customers(user_id,first_name,last_name,date_of_birth,gender,nic_number,licence_number,address,mobile,email,nic_pdf,profile_image,password)
            VALUES ('$id','$fname','$lname','$dob','$gender','$nic','$licno','$address','$mob','$email','$nic_pdf','$prof_img','$pw')";
       
    // Execute the query
    if ($conn->query($sql)) {
        if ($conn->affected_rows > 0) {
            echo "<h1>Records inserted successfully.</h1>";
        } else {
            echo "<h1>No insertions were made to the records.</h1>";
        }
    }
    else {
        // Show detailed error message for debugging
        echo "<h1>Error, records cannot be inserted.</h1>";
         echo "<p>" . $conn->error . "</p>"; // Shows the MySQL error
        }

    }
else{
    echo "No update";
}

$conn->close();

?>