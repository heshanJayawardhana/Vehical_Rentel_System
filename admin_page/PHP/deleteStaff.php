<?php
require_once '../../includes/config.php';

$StaffID=$_GET['StaffID'];
if($StaffID){
    $sql="DELETE FROM staff WHERE StaffID=$StaffID";
}

// Execute the query
if ($conn->query($sql)) {
    if ($conn->affected_rows > 0) {
         echo "<h1>Records deleted successfully.</h1>";
    } else {
         echo "<h1>No changes were made to the records.</h1>";
    }
}
else {
    // Show detailed error message for debugging
     echo "<h1>Error, records cannot be deleted.</h1>";
     echo "<p>" . $conn->error . "</p>"; // Shows the MySQL error
}


$conn->close();
?>