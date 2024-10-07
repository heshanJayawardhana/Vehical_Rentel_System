<?php
require_once './../includes/config.php';

$uid=$_GET['user_id'];
if($uid){
    $sql="DELETE FROM customers WHERE user_id='$uid'";
}

// Execute the query
if ($con->query($sql)) {
    if ($con->affected_rows > 0) {
         echo "<h1>Records deleted successfully.</h1>";
    } else {
         echo "<h1>No changes were made to the records.</h1>";
    }
}
else {
    // Show detailed error message for debugging
     echo "<h1>Error, records cannot be deleted.</h1>";
     echo "<p>" . $con->error . "</p>"; // Shows the MySQL error
}


$con->close();
?>