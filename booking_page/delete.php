<?php //correct one

    require 'config.php';

    $ID=$_POST["bId"];

    $sql = "DELETE FROM reservation 
            WHERE 	BookingID='$ID'";

    if($conn->query($sql))
    {
        echo "<script>alert(Deleted !)</script>";
        header("Location: readBooking.php");
    }
    else{
        echo "Not Deleted !";
    }
?>