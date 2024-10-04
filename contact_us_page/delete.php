<?php

require '../includes/config.php';

$ID= $_POST["ID"];

    $sql = "DELETE FROM contact_requests WHERE ID = '$ID'";

    if($conn -> query($sql))
    {
        echo "Deleted.";
    }
    else {
        echo "not successful.";
    }

    $con -> close();

    echo "<br><button type='submit' value='read'><a href='ContactUs.php' style='text-decoration: none; color:red;'>Back</button>"; 
?>