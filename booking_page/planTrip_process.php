<?php

    require '../includes/config.php';   // Connection to the database

    // Retrieve the form data
    $vehicleID = $_POST["vId"];
    $contact = $_POST["phone"];
    $destination = $_POST["destination"];
    $sDate = $_POST["start_date"];
    $endDate = $_POST["return_date"];
    $mem = $_POST["numberofMembers"];
    $note = $_POST["addnote"];
    $Needdriver = $_POST["driver"];
    $charge = $_POST["price"];

    // Insert data into the reservation table
    $sql = "INSERT INTO reservation (vehicleID, ContactNo, Destination_Purpose, RentalStratDate_Time, RentalEndDate_Time, NoOfMembers, AdditionalNote, NeedaDriver, amount)
            VALUES ('$vehicleID', '$contact', '$destination', '$sDate', '$endDate', '$mem', '$note', '$Needdriver', '$charge')";

    // Check if the query was successful
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Booking Successful!')</script>";
        header("Location: ./readBooking.php"); // Redirect to booking page
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";  // Display the error message
    }

    $conn->close();  // Close the database connection

?>
