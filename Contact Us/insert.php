<?php

require 'config.php';

    $ID= $_POST['ID'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $subject=$_POST['subject'];
    $message = $_POST['message'];

    // Insert into database
    $sql = "INSERT INTO contact_requests VALUES ('$ID','$firstname','$lastname','$email','$subject','$message')";

    if($con-> query($sql))
    {
        echo "insert successful";
    }
    else{
        echo "Error".$con->error;
    }
    echo "<br><button type='submit' value='read'><a href='ContactUs.php' style='text-decoration: none; color:red;'>Back to Contact page</button>";

    $con->close();

?>