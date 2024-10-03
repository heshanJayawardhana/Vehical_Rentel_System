<?php
    require 'config.php';

    $ID= $_POST['ID'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $subject=$_POST['subject'];
    $message = $_POST['message'];

    if (empty($ID)|| empty($firstname) || empty($lastname) || empty($email) || empty($subject) || empty($message))
    {
        echo "ALL required.";
    }
    else
     {
         $sql="UPDATE contact_requests SET firstname ='$firstname',  lastname = '$lastname' ,  email='$email',  subject_='$subject' , message_ = '$message' WHERE ID = '$ID'";

    if($con->query($sql))
    {
    echo "Info updated.";
}
else{
    echo "not updated.";
}
}
echo "<br><button type='submit' value='read'><a href='read.php' style='text-decoration: none; color:red;'>Back</button>";  

?>