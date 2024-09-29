<?php 

// connection
include '../includes/config.php';

if (isset($_GET['id'])) {

    $review_id = $_GET['id'];

    // SQL to delete a record
    $sql = "DELETE FROM reviews WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $review_id);

    if($stmt -> execute()){

        header("Location: ./review.php");

        exit();
    }

    $stmt -> close();

}

// close connection
include '../includes/closecon.php';

?>