<?php 

// connection
include '../includes/config.php';

function createID ($con) {
    $getId = 'SELECT id FROM reviews ORDER BY id DESC LIMIT 1';
    $result = $con -> query($getId);
    $text = 'RV';

    if ($result -> num_rows > 0) {
        $row = $result -> fetch_assoc();
        $last_id = $row['id'];
        $new_no = intval(substr($last_id, 2)) + 1;
        $new_id = $text . sprintf('%03', $new_no);
    } else {
        $new_id = $text . '001';
    }

    return $new_id;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $review = $_POST['comment'];
    $rate = $_POST['rate_amount']; 
    $customer = $_POST['user'];
    
    $review_id = createID ($conn);

    // set sql query -> INSERT INTO ..
    $sql = "INSERT INTO reviews (id, customer_id, review, rate, created_at) VALUES (?, ?, ?, ?, NOW())";

    $stmt = $conn -> prepare($sql);
    $stmt -> bind_param('ssss', $review_id, $customer, $review, $rate);

    if($stmt -> execute()){

        header("Location: ./review.php");

        exit();
    }

    $stmt -> close();
}

// close connection
include '../includes/closecon.php';
?>