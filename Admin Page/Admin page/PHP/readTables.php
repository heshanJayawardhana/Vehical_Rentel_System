<?php

require_once '../../PHP/config.php';

?>
<html>
    <head>
    <style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

tables th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

td{
    cursor:text;

}

span img{
    position:absolute;
    right:0%;
    cursor:pointer;
}
</style>
    </head>

    <body>
        <?php


    if(isset($_GET['name'])){
        $name=isset($_GET['name']) ? $_GET['name'] : null;

      //---------------------------------------------------------Create customer table-------------------------------------------------  
        if($name=='customer'){
            $sql="SELECT * FROM customer";

            $result=$con->query($sql);

            echo "<table id='myTable' name='customer'>
            <tr>
            <td>Customer ID</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Username</td>
            <td>Password</td>
            <td>NIC</td>
            <td>Gender</td>
            <td>DOB</td>
            <td>Address</td>
            <td>Bio</td>
            <td>Profile</td>
            <td>Update</td>
            </tr>";



            
            while($row=$result->fetch_assoc()){
                echo "<tr>"; //start a new row

                foreach($row as $key=>$value){
                    echo "<td>".htmlspecialchars($value)."</td>";
                }
                //echo "<td><span><a href='update.php?name=$name'>Update</a></span></td>"
                echo "<td>
                <form class='updateForm' id='deleteForm'>
                    <input type='hidden' name='customer_id' value='" . $row['CusID'] . "'>
                    <button class='updateBtn'>Update</button>
                    <button class='saveBtn' style='display:none;'>Save</button>
                </form> 
                
            </td><td>
            <button class='deleteBtn'>Delete</button></td>";
                echo "</tr>"; //Close the row
            

        }

        echo "</table><span id='addRowButtonCustomer'><img src='../Images/plus.png' height='10%' width='4%' id='I'm image'></span>";
        //-------------------------------------------------------------Enter add button-----------------------------------------------------------

        //echo "<span id='addRowButtonCustomer'><img src='../Images/plus.png' height='10%' width='4%' id='I'm image'></span></div>";
        }

        //---------------------------------------------------------Create staff table-------------------------------------------------  
        if($name=='staff'){
            $sql="SELECT * FROM staff";

            $result=$con->query($sql);

            echo "<table id='myTable' name='staff'>
            <tr>
            <td>Staff  ID</td>
            <td>NIC</td>
            <td>Bonus</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Age</td>
            <td>Address</td>
            <td>Salary</td>
            <td>DOB</td>
            </tr>";

            
            while($row=$result->fetch_assoc()){
                echo "<tr>"; //start a new row

                foreach($row as $key=>$value){
                    echo "<td>".htmlspecialchars($value)."</td>";
                }
                //echo "<td><span><a href='update.php?name=$name'>Update</a></span></td>"
                echo "<td>
                <form class='updateForm'>
                    <input type='hidden' name='staff_id' value='" . $row['StaffID'] . "'>
                    <button class='updateBtn'>Update</button>
                    <button class='saveBtn' style='display:none;'>Save</button>
                    
                </form>
            </td><td>
            <button class='deleteBtn'>Delete</button></td>";
                echo "</tr>"; //Close the row
            

        }

        echo "</table><br><br><span id='addRowButtonStaff'><img src='../Images/plus.png' height='10%' width='4%' id='I'm image'></span>";
        }

        //---------------------------------------------------------Create driver table-------------------------------------------------  

        else if($name=='driver'){
            $sql="SELECT * FROM driver";

            $result=$con->query($sql);

            echo "<table id='myTable' name='driver'>
            <tr>
            <td>Driver ID</td>
            <td>Staff ID</td>
            <td>License No</td>
            </tr>";


            while($row=$result->fetch_assoc()){
                echo "<tr>"; //start a new row

                foreach($row as $key=>$value){
                    echo "<td>".htmlspecialchars($value)."</td>";
                }
                //echo "<td><span><a href='update.php?name=$name'>Update</a></span></td>"
                echo "<td>
                <form class='updateForm'>
                    <input type='hidden' name='driver_id' value='" . $row['DriverID'] . "'>
                    <button class='updateBtn'>Update</button>
                    <button class='saveBtn' style='display:none;'>Save</button>
                    </form>
            </td><td>
            <button class='deleteBtn'>Delete</button></td>";
                echo "</tr>"; //Close the row
            

        }

        echo "</table><br><br><span id='addRowButtonDriver'><img src='../Images/plus.png' height='10%' width='4%' id='I'm image'></span>";
        }
        

        //---------------------------------------------------------Create rental agent table-------------------------------------------------  

        else if($name=='rentalagent'){
            $sql="SELECT * FROM rentalagent";

            $result=$con->query($sql);

            echo "<table id='myTable' name='rentalagent'>
            <tr>
            <td>Agent ID</td>
            <td>Staff ID</td>
            </tr>";

            while($row=$result->fetch_assoc()){
                echo "<tr>"; //start a new row

                foreach($row as $key=>$value){
                    echo "<td>".htmlspecialchars($value)."</td>";
                }
                //echo "<td><span><a href='update.php?name=$name'>Update</a></span></td>"
                echo "<td>
                <form class='updateForm'>
                    <input type='hidden' name='agent_id' value='" . $row['AgentID'] . "'>
                    <button class='updateBtn'>Update</button>
                    <button class='saveBtn' style='display:none;'>Save</button>
                </form>
            </td><td>
            <button class='deleteBtn'>Delete</button></td>";
                echo "</tr>"; //Close the row
            

        }

        echo "</table><br><br><span id='addRowButtonRentalagent'><img src='../Images/plus.png' height='10%' width='4%' id='I'm image'></span>";
        }
      

        //---------------------------------------------------------Create branch table-------------------------------------------------  

        else if($name=='branch'){
            $sql="SELECT * FROM branch";

            $result=$con->query($sql);

            echo "<table id='myTable' name='branch'>
            <tr>
            <td>Branch ID</td>
            <td>Email</td>
            <td>Address</td>
            <td>Location</td>
            </tr>";

            while($row=$result->fetch_assoc()){
                echo "<tr>"; //start a new row

                foreach($row as $key=>$value){
                    echo "<td>".htmlspecialchars($value)."</td>";
                }
                //echo "<td><span><a href='update.php?name=$name'>Update</a></span></td>"
                echo "<td>
                <form class='updateForm'>
                    <input type='hidden' name='branch_id' value='" . $row['BranchID'] . "'>
                    <button class='updateBtn'>Update</button>
                    <button class='saveBtn' style='display:none;'>Save</button>
                </form>
            </td><td>
            <button class='deleteBtn'>Delete</button></td>";
                echo "</tr>"; //Close the row
            

        }

        echo "</table><br><br><span id='addRowButtonBranch'><img src='../Images/plus.png' height='10%' width='4%' id='I'm image'></span>";
        }
       
        
        //---------------------------------------------------------Create branch contact table-------------------------------------------------  

        else if($name=='branchcontact'){
            $sql="SELECT * FROM branchcontact";

            $result=$con->query($sql);

            echo "<table id='myTable' name='branchcontact'>
            <tr>
            <td>Branch ID</td>
            <td>Telno</td>
            </tr>";

            while($row=$result->fetch_assoc()){
                echo "<tr>"; //start a new row

                foreach($row as $key=>$value){
                    echo "<td>".htmlspecialchars($value)."</td>";
                }
                //echo "<td><span><a href='update.php?name=$name'>Update</a></span></td>"
                echo "<td>
                <form class='updateForm'>
                    <input type='hidden' name='branID' value='" . $row['BranchID'] . "'>
                    <input type='hidden' name='telB' value='" . $row['Telno'] . "'>
                    <button class='updateBtn'>Update</button>
                    <button class='saveBtn' style='display:none;'>Save</button>
                </form>
            </td><td>
            <button class='deleteBtn'>Delete</button></td>";
                echo "</tr>"; //Close the row
            

        }

        echo "</table><br><br><span id='addRowButtonBranchcontact'><img src='../Images/plus.png' height='10%' width='4%' id='I'm image'></span>";
        }
      

        //---------------------------------------------------------Create customer contact table-------------------------------------------------  

        else if($name=='cuscontact'){
            $sql="SELECT * FROM cuscontact";

            $result=$con->query($sql);

            echo "<table id='myTable' name='cuscontact'>
            <tr>
            <td>Customer ID</td>
            <td>Telno</td>
            </tr>";

            while($row=$result->fetch_assoc()){
                echo "<tr>"; //start a new row

                foreach($row as $key=>$value){
                    echo "<td>".htmlspecialchars($value)."</td>";
                }
                //echo "<td><span><a href='update.php?name=$name'>Update</a></span></td>"
                echo "<td>
                <form class='updateForm'>
                    <input type='hidden' name='cusID' value='" . $row['CID'] . "'>
                    <input type='hidden' name='telC' value='" . $row['Tel'] . "'>
                    <button class='updateBtn'>Update</button>
                    <button class='saveBtn' style='display:none;'>Save</button>
                </form>
            </td><td>
            <button class='deleteBtn'>Delete</button></td>";
                echo "</tr>"; //Close the row
            

        }

        echo "</table><br><br><span id='addRowButtonCuscontact'><img src='../Images/plus.png' height='10%' width='4%' id='I'm image'></span>";
        }
       

        //---------------------------------------------------------Create customer Email table-------------------------------------------------  

        else if($name=='cusemail'){
            $sql="SELECT * FROM cusemail";

            $result=$con->query($sql);

            echo "<table id='myTable' name='cusemail'>
            <tr>
            <td>Customer ID</td>
            <td>Email</td>
            </tr>";

            while($row=$result->fetch_assoc()){
                echo "<tr>"; //start a new row

                foreach($row as $key=>$value){
                    echo "<td>".htmlspecialchars($value)."</td>";
                }
                //echo "<td><span><a href='update.php?name=$name'>Update</a></span></td>"
                echo "<td>
                <form class='updateForm'>
                    <input type='hidden' name='ctmID' value='" . $row['CID'] . "'>
                    <input type='hidden' name='emailC' value='" . $row['Email'] . "'>
                    <button class='updateBtn'>Update</button>
                    <button class='saveBtn' style='display:none;'>Save</button>
                </form>
            </td><td>
            <button class='deleteBtn'>Delete</button></td>";
                echo "</tr>"; //Close the row
            

        }

        echo "</table><br><br><span id='addRowButtonCusemail'><img src='../Images/plus.png' height='10%' width='4%' id='I'm image'></span>";
        }
        

        //---------------------------------------------------------Create payment table-------------------------------------------------  

        else if($name=='payment'){
            $sql="SELECT * FROM payment";

            $result=$con->query($sql);

            echo "<table id='myTable' name='payment'>
            <tr>
            <td>Payment ID</td>
            <td>Rental ID</td>
            <td>Payment Status</td>
            <td>Amount</td>
            <td>Method</td>
            <td>Date</td>
            </tr>";

            while($row=$result->fetch_assoc()){
                echo "<tr>"; //start a new row

                foreach($row as $key=>$value){
                    echo "<td>".htmlspecialchars($value)."</td>";
                }
                //echo "<td><span><a href='update.php?name=$name'>Update</a></span></td>"
                echo "<td>
                <form class='updateForm'>
                    <input type='hidden' name='payment_id' value='" . $row['PaymentID'] . "'>
                    <button class='updateBtn'>Update</button>
                    <button class='saveBtn' style='display:none;'>Save</button>
                </form>
            </td><td>
            <button class='deleteBtn'>Delete</button></td>";
                echo "</tr>"; //Close the row
            

        }

        echo "</table><br><br><span id='addRowButtonPayment'><img src='../Images/plus.png' height='10%' width='4%' id='I'm image'></span>";
        }
        

        //---------------------------------------------------------Create rental table-------------------------------------------------  

        else if($name=='rental'){
            $sql="SELECT * FROM rental";

            $result=$con->query($sql);

            echo "<table id='myTable' name='rental' >
            <tr>
            <td>Rental ID</td>
            <td>Reservation ID</td>
            <td>Agent ID</td>
            <td>Journey Status</td>
            <td>Payment Status</td>
            </tr>";

            while($row=$result->fetch_assoc()){
                echo "<tr>"; //start a new row

                foreach($row as $key=>$value){
                    echo "<td>".htmlspecialchars($value)."</td>";
                }
                //echo "<td><span><a href='update.php?name=$name'>Update</a></span></td>"
                echo "<td>
                <form class='updateForm'>
                    <input type='hidden' name='rental_id' value='" . $row['RentalID'] . "'>
                    <button class='updateBtn'>Update</button>
                    <button class='saveBtn' style='display:none;'>Save</button>
                </form>
            </td><td>
            <button class='deleteBtn'>Delete</button></td>";
                echo "</tr>"; //Close the row
            

        }

        echo "</table><br><br><span id='addRowButtonRental'><img src='../Images/plus.png' height='10%' width='4%' id='I'm image'></span>";
        }
       

        //---------------------------------------------------------Create reservation table-------------------------------------------------  

        else if($name=='reservation'){
            $sql="SELECT * FROM reservation";

            $result=$con->query($sql);

            echo "<table id='myTable' name='reservation'>
            <tr>
            <td>Reservation ID</td>
            <td>Customer ID</td>
            <td>Branch ID</td>
            <td>Destination</td>
            <td>No of adults</td>
            <td>No of children</td>
            <td>Pickup Time</td>
            <td>Return Time</td>
            <td>Pickup Date</td>
            <td>Return Date</td>
            <td></td>
            <td></td>
            </tr>";

            while($row=$result->fetch_assoc()){
                echo "<tr>"; //start a new row

                foreach($row as $key=>$value){
                    echo "<td>".htmlspecialchars($value)."</td>";
                }
                //echo "<td><span><a href='update.php?name=$name'>Update</a></span></td>"
                echo "<td>
                <form class='updateForm'>
                    <input type='hidden' name='reservation_id' value='" . $row['ReservationID'] . "'>
                    <button class='updateBtn'>Update</button>
                    <button class='saveBtn' style='display:none;'>Save</button>
                </form>
            </td><td>
            <button class='deleteBtn'>Delete</button></td>";
                echo "</tr>"; //Close the row
            

        }

        echo "</table><br><br><span id='addRowButtonReservation'><img src='../Images/plus.png' height='10%' width='4%' id='I'm image'></span>";
        }
        
    }



    

    else{
        echo $con->connect_error;
    }

    ?>



<script src="../JS/edit_table.js"></script>
<script src="../JS/addData.js"></script>
</body>

</html>