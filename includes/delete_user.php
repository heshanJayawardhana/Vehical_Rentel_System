<?php 

session_start();

include '../includes/config.php';

// First, delete related records in the reviews table
$delete_reviews_sql = "DELETE FROM reviews WHERE customer_id = '".$_SESSION['user_id']."'";
$conn->query($delete_reviews_sql);

// Now, delete the user from the customers table
$delete_user_sql = "DELETE FROM ".$_SESSION['type']." WHERE user_id = '".$_SESSION['user_id']."'";
if ($conn->query($delete_user_sql) === true && $conn->affected_rows > 0) {
    header("Location: ../includes/logout.php");
    exit();
} else {
    echo 'something went wrong!';
}

$conn->close();

?>
