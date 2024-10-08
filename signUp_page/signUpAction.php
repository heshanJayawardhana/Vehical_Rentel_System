<?php 

// connection
include '../includes/config.php';


// generate custoer id accordingly(else Driver)
function createID ($con, $type) {
    if ($type === 'customers') {
        $text = 'CS';
    } else {
        $text = 'DV';
    }
    $getId = 'SELECT user_id FROM '.$type.' ORDER BY user_id DESC LIMIT 1';
    $result = $con -> query($getId);

    if ($result -> num_rows > 0) {
        $row = $result -> fetch_assoc();
        $last_id = $row['user_id'];
        $new_no = intval(substr($last_id, 2)) + 1;
        $new_id = $text . sprintf('%03d', $new_no);
    } else {
        $new_id = $text . '001';
    }

    return $new_id;
}

// check for post requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $doB = $_POST['doB'];
    $gender = $_POST['gender'];
    $nicNo = $_POST['nicNo'];
    $licenceNo = $_POST['licenceNo'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $regType = $_POST['reg_type'];

    $user_id = createID ($conn, $regType);
    
    if ($regType == 'customers') {
        $user_image = '../images/placeholder.png'; // Added semicolon
        
        // rename files
        $nicPDF = $user_id.'_nic_scan_pdf.'.pathinfo($_FILES['nicPDF']['name'], PATHINFO_EXTENSION);
    
        // set paths & sql table values of files
        $nicPath = '../documents/customers/nic_pdf/'. $nicPDF;
    
        // move uploaded files
        move_uploaded_file($_FILES['nicPDF']['tmp_name'], $nicPath);
    
        // set sql query -> INSERT INTO ..
        $sql = "INSERT INTO customers (user_id, first_name, last_name, date_of_birth, gender, nic_number, licence_number, address, mobile, email, nic_pdf, profile_image, password, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    
        $stmt = $conn -> prepare($sql);
        $stmt -> bind_param('sssssssssssss', $user_id, $firstName, $lastName, $doB, $gender, $nicNo, $licenceNo, $address, $mobile, $email, $nicPath, $user_image, $pwd);

        $imgPath = $user_image; 
    } else { // Driver part
        // rename files
        $nicPDF = $user_id.'_nic_scan_pdf.'.pathinfo($_FILES['nicPDF']['name'], PATHINFO_EXTENSION);
        $licencePDF = $user_id.'_licence_scan_pdf.'.pathinfo($_FILES['licencePDF']['name'], PATHINFO_EXTENSION);
        $imgFile = $user_id.'_profile_picture.'.pathinfo($_FILES['profileImage']['name'], PATHINFO_EXTENSION);
    
        // set paths
        $nicPath = '../documents/drivers/nic_pdf/'. $nicPDF;
        $licencePath = '../documents/drivers/licence_pdf/'. $licencePDF;
        $imgPath = '../documents/drivers/profile_pic/'. $imgFile;
    
        // move uploaded files
        move_uploaded_file($_FILES['nicPDF']['tmp_name'], $nicPath);
        move_uploaded_file($_FILES['licencePDF']['tmp_name'], $licencePath);
        move_uploaded_file($_FILES['profileImage']['tmp_name'], $imgPath);
    
        // set sql query -> INSERT INTO ..
        $sql = "INSERT INTO drivers (user_id, first_name, last_name, date_of_birth, gender, nic_number, licence_number, address, mobile, email, nic_pdf, licence_pdf, profile_image, password, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    
        $stmt = $conn -> prepare($sql);
        $stmt -> bind_param('ssssssssssssss', $user_id, $firstName, $lastName, $doB, $gender, $nicNo, $licenceNo, $address, $mobile, $email, $nicPath, $licencePath, $imgPath, $pwd);
    }
    

    if ($stmt -> execute()) {
        session_start();  //login the user
        $_SESSION['type'] = $regType;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['profile_image'] = $imgPath;
    
        // header("Location: path_to_profile_dashboard");
        echo 'Registration Succeeded :) \n ' . $_SESSION['user_id'];
        header("Location: ../dashboard/customer_profile.php");
        exit();
    } else { // Corrected here
        // redirect to error page if there are any
        echo 'Registration Failed :( ';
        exit();
    }
    
    $stmt -> close();
}


// close connection
include '../includes/closecon.php'
?>