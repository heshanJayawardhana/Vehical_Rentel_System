<?php

require 'config.php';

        //id - already set to auto increment 
        $bID=$_POST['bid']; 
        $vehicleNo = $_POST["vId"];
        $contact =$_POST["phone"];
        $desty = $_POST["destination"];
        $start=$_POST["start_date"];
        $end =$_POST["return_date"];
        $mber =$_POST["numberofMembers"];
        $note=$_POST["addnote"];
        $Needdriver =$_POST["driver"];

        if(empty($bID)||empty($vehicleNo)||empty($contact)||empty($desty)||empty($start)||empty($end)||empty($mber)||empty($Needdriver))
        {
            echo "All required!";
        }
        else{

           $sql="UPDATE reservation 
                set vehicleID ='$vehicleNo',
                ContactNo='$contact',
                Destination_Purpose ='$desty' ,
                RentalStratDate_Time ='$start' ,
                RentalEndDate_Time ='$end' ,
                NoOfMembers='$mber',
                AdditionalNote='$note',
                NeedaDriver='$Needdriver'
                WHERE BookingID = '$bID'";

                if($conn->query($sql))
                {
                    echo "<script>alert('Booking Updated!')</script>";
                    header("Location: booking.php");
            //user head to booking page change here 
            //link payment page

                }
                else{
                    echo "Not updated";
                    header("Location: booking.php");
                }
        }

        $conn->close(); //close connection
?>










