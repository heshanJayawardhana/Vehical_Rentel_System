<?php

    require 'config.php';   //connection (Leave a space before connection file link)

        //id - already set to auto increment 
        // $bID=$_POST['id']; 
        $vehicleID = $_POST["vId"];
        $contact =$_POST["phone"];
        $destination = $_POST["destination"];
        $sDate = $_POST["start_date"];
        $endDate=$_POST["return_date"];
        $mem =$_POST["numberofMembers"];
        $note=$_POST["addnote"];
        $Needdriver =$_POST["driver"];

       
        //insert data in the db
                        //table name     A.I- pass only single qoutes.... varible names
        $sql="INSERT INTO reservation VALUES('','$vehicleID','$contact','$destination' ,
                                            '$sDate',
                                            '$endDate' ,'$mem' , '$note' ,'$Needdriver')";

        //check if form submitted
        if($conn->query($sql))
        {
            echo "<script>alert('Booking Successful!')</script>";
            //window.history.back();
            
            header("Location: readBooking.php");
            //user head to booking page change here 
            //link payment page
            
            //echo "<h3>Total Rental Cost: Rs. $totalAmount</h3>";
        }
        else
        {
            echo "<script>alert('Error!!');</script>";
        }
    
    $conn->close();
 
?>