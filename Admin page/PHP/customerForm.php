<?php

require_once './../includes/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer Form</title>

        <link rel="stylesheet" href="../CSS/formStyles.css">
</link>
</head>
<body>
    <div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label>Enter User_ID:</label><br><br>
    <input type='text' name='user_id' value='' ><br><br>
    <label>Enter First Name:</label><br><br>
    <input type='text' name='first_name' value='' required><br><br>
    <label>Enter Last Name:</label><br><br>
    <input type='text' name='last_name' value=''required ><br><br>
    <label>Enter DOB:</label><br><br>
    <input type='date' name='date_of_birth' value=''><br><br>
    <label>Enter Gender:</label><br><br>
    Male<input type='radio' name='gender' value='male'>
    Female<input type='radio' name='gender' value='female'><br><br>
    <label>Enter NIC:</label><br><br>
    <input type='text' name='nic_number' value='' required><br><br>
    <label>Enter Licence No:</label><br><br>
    <input type='text' name='licence_number' value='' ><br><br>
    <label>Enter Address:</label><br><br>
    <textarea name='address' value='' ></textarea><br><br>
    <label>Enter TelNo:</label><br><br>
    <input type='tel' name='mobile' value='' required><br><br>
    <label>Enter Email Address:</label><br><br>
    <input type='email' name='email' value='' ><br><br>
    <label>Enter the URL of the PDF of NIC:</label><br><br>
    <input type='text' name='nic_pdf' value='' ><br><br>
    <label>Enter the URL of the profile image:</label><br><br>
    <input type='text' name='profile_image' value=''><br><br>
    <label>Enter password:</label><br><br>
    <input type='password' name='password' value=''  pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' required><br><br>
    <input type='submit' name='submitBtn' value='save'></form></div>
<?php
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
   

    // Ensure to use quotes around string values
    $sql = "INSERT INTO customers(user_id,first_name,last_name,date_of_birth,gender,nic_number,licence_number,address,mobile,email,nic_pdf,profile_image,password)
            VALUES ('$id','$fname','$lname','$dob','$gender','$nic','$licno','$address','$mob','$email','$nic_pdf','$prof_img','$pw')";
       
    // Execute the query
    if ($con->query($sql)) {
        if ($con->affected_rows > 0) {
            echo "<h1>Records inserted successfully.</h1>";
        } else {
            echo "<h1>No insertions were made to the records.</h1>";
        }
    }
    else {
        // Show detailed error message for debugging
        echo "<h1>Error, records cannot be inserted.</h1>";
         echo "<p>" . $con->error . "</p>"; // Shows the MySQL error
        }

    }


$con->close();


?>
</body>
</html>