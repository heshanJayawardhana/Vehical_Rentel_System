<html>
<head></head>
<body>
<?php

require_once "config.php"; //Link connection file
//require_once "user account.php"; //Link user account file

//----------------Capture the value sent from user account file-------------------
if(isset($_GET['name'])){  //Check whether the value exists
    $name=isset($_GET['name']) ? $_GET['name'] : null;

}

 //-----------To retrieve the current activity -----------------

if($name=='pair1'){

    //-----------To retrieve the current reservations -----------------

    $sql="SELECT R.ReservationID,B.Location AS 'Branch Name',R.Destination,R.NoOfAdults,R.NoOfChildren,R.PickupTime,R.ReturnTime,R.PickupDate,R.ReturnDate
    FROM Reservation R, Branch B
    WHERE R.BranchID=B.BranchID AND R.CID=1 AND R.ReturnDate<CURDATE();";

    //Run the query and assign to a variable
    $result=$con->query($sql);

    if ($con->error) {
        echo "SQL Error: " . $con->error;
    }
    

    if($result -> num_rows > 0){

       //-----------columns of reservations
        echo "<table style='width:100%;border:1px solid black;' class='display1'>
        <tr>
        <th>Reservation ID</th>
        <th>Branch Name</th>
        <th>Destination</th>
        <th>No of adults</th>
        <th>No of children</th>
        <th>Pickup Time</th>
        <th>Return Time</th>
        <th>Pickup Date</th>
        <th>Return Date</th>
        </tr>";
         // Loop through all results
        while($row=$result->fetch_assoc()){
            echo "<tr>"; //start a new row

            foreach($row as $key=>$value){
                echo "<td>".htmlspecialchars($value)."</td>";
            }

            echo "</tr>"; //Close the row

        }

        echo "</table>";
    }
    else{

        echo "No reservation records found.";
    }

    //-----------To retrieve the current rentals -----------------

    $sql2="SELECT Ren.RentalID,Ren.ReservationID,CONCAT(S.FirstName, ' ', S.LastName) AS RentalAgentName,Ren.JourneyStatus,Ren.PaymentStatus
    FROM rental Ren,staff S,reservation Res,rentalagent RenAge
    WHERE Ren.ReservationID=Res.ReservationID AND Ren.AgentID= RenAge.AgentID AND RenAge.StaffID=S.StaffID AND Ren.ReservationID IN (SELECT ReservationID
                                                                                                                                     FROM reservation
                                                                                                                                     WHERE CID=1 AND ReturnDate<CURDATE());"; 

    //Run the query and assign to a variable
    $result2=$con->query($sql2);

    if ($con->error) {
        echo "SQL Error: " . $con->error;
    }

    echo "<br><br>";

     //-----------columns of rentals
    if($result2 -> num_rows > 0){
        echo "<table style='width:100%;border:1px solid black;' class='display1'>
        <tr>
        <th>Rental ID</th>
        <th>Reservation ID</th>
        <th>Rental Agent Name</th>
        <th>Journey Status</th>
        <th>Payment Status</th>
        </tr>";

         // Loop through all results
         while($row=$result2->fetch_assoc()){
            echo "<tr>"; //start a new row

            foreach($row as $key=>$value){
                echo "<td>".htmlspecialchars($value)."</td>";
            }

            echo "</tr>"; //Close the row

        }

        echo "</table><br><br>";


    }

    else{

        echo "No reservation records found.";
    }


}

//-----------To retrieve the past activity -----------------

if($name=='pair2'){

    //-----------To retrieve the past reservations -----------------

    $sql="SELECT R.ReservationID,B.Location AS 'Branch Name',R.Destination,R.NoOfAdults,R.NoOfChildren,R.PickupTime,R.ReturnTime,R.PickupDate,R.ReturnDate
    FROM Reservation R, Branch B
    WHERE R.BranchID=B.BranchID AND R.CID=1 AND R.ReturnDate>CURDATE();";

    //Run the query and assign to a variable
    $result=$con->query($sql);

    if ($con->error) {
        echo "SQL Error: " . $con->error;
    }
    

    if($result -> num_rows > 0){

       //-----------columns of reservations
        echo "<table style='width:100%;border:1px solid black;' class='display1'>
        <tr>
        <th>Reservation ID</th>
        <th>Branch Name</th>
        <th>Destination</th>
        <th>No of adults</th>
        <th>No of children</th>
        <th>Pickup Time</th>
        <th>Return Time</th>
        <th>Pickup Date</th>
        <th>Return Date</th>
        </tr>";
         // Loop through all results
        while($row=$result->fetch_assoc()){
            echo "<tr>"; //start a new row

            foreach($row as $key=>$value){
                echo "<td>".htmlspecialchars($value)."</td>";
            }

            echo "</tr>"; //Close the row

        }

        echo "</table>";
    }
    else{

        echo "No reservation records found.";
    }

    //-----------To retrieve the past rentals -----------------

    $sql2="SELECT Ren.RentalID,Ren.ReservationID,CONCAT(S.FirstName, ' ', S.LastName) AS RentalAgentName,Ren.JourneyStatus,Ren.PaymentStatus
    FROM rental Ren,staff S,reservation Res,rentalagent RenAge
    WHERE Ren.ReservationID=Res.ReservationID AND Ren.AgentID= RenAge.AgentID AND RenAge.StaffID=S.StaffID AND Ren.ReservationID IN (SELECT ReservationID
                                                                                                                                     FROM reservation
                                                                                                                                     WHERE CID=1 AND ReturnDate>CURDATE());"; 

    //Run the query and assign to a variable
    $result2=$con->query($sql2);

    if ($con->error) {
        echo "SQL Error: " . $con->error;
    }

    echo "<br><br>";

     //-----------columns of rentals
    if($result2 -> num_rows > 0){
        echo "<table style='width:100%;border:1px solid black;' class='display1'>
        <tr>
        <th>Rental ID</th>
        <th>Reservation ID</th>
        <th>Rental Agent Name</th>
        <th>Journey Status</th>
        <th>Payment Status</th>
        </tr>";

         // Loop through all results
         while($row=$result2->fetch_assoc()){
            echo "<tr>"; //start a new row

            foreach($row as $key=>$value){
                echo "<td>".htmlspecialchars($value)."</td>";
            }

            echo "</tr>"; //Close the row

        }

        echo "</table><br><br>";


    }

    else{

        echo "No reservation records found.";
    }


}

if($name=='pair3'){
    $sql="SELECT * FROM Payment;";

    //Run the query and assign to a variable
    $result=$con->query($sql);

    if ($con->error) {
        echo "SQL Error: " . $con->error;
    }

    echo "<br><br>";

     //-----------columns of rentals
    if($result -> num_rows > 0){
        echo "<table style='width:100%;border:1px solid black;' class='display1'>
        <tr>
        <th>Payment ID</th>
        <th>Rental ID</th>
        <th>Payment Status</th>
        <th>Amount</th>
        <th>Method</th>
        <th>Date</th>
        </tr>";

         // Loop through all results
         while($row=$result->fetch_assoc()){
            echo "<tr>"; //start a new row

            foreach($row as $key=>$value){
                echo "<td>".htmlspecialchars($value)."</td>";
            }

            echo "</tr>"; //Close the row

        }

        echo "</table><br><br>";


    }

    else{

        echo "No payment records found.";
    }


}


?>
</body>
</html>