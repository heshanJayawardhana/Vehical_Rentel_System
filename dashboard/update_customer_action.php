<?php 

session_start();
include '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $first_name = $_POST['f_name'];
    $last_name = $_POST['l_name'];
    $nic_number = $_POST['nic'];
    $contact = $_POST['contact'];
    $license_number = $_POST['licen'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Handle image upload
    $imgPath = '../documents/customers/profile_pic/default.jpg'; // Default image path
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $imgFile = $user_id . '_profile_picture.' . pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        $imgPath = '../documents/customers/profile_pic/' . $imgFile;
        move_uploaded_file($_FILES['img']['tmp_name'], $imgPath);
    } else {
        // Fetch existing image if no new image is uploaded
        $user_sql = "SELECT profile_image FROM customers WHERE user_id = '" . $_SESSION['user_id'] . "'";
        $user_query = $conn->query($user_sql);
        if ($user_query->num_rows > 0) {
            $user = $user_query->fetch_assoc();
            $imgPath = $user['profile_image'];
        }
    }

    // Update customer profile
    $update_sql = "UPDATE customers SET first_name = ?, last_name = ?, nic_number = ?, licence_number = ?, address = ?, mobile = ?, email = ?, profile_image = ? WHERE user_id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("sssssssss", $first_name, $last_name, $nic_number, $license_number, $address, $contact, $email, $imgPath, $user_id);

    if ($stmt->execute()) {
        header("Location: ../dashboard/customer_profile.php");
        exit();
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

?>
