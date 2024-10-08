<?php

require_once '../../includes/config.php';

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



table th {
  padding-top: 12px;
  padding-bottom: 12px;
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

<link rel="stylesheet" href="../CSS/readtablesStyles.css">
    </head>

    <body>
        <?php


    if(isset($_GET['name'])){
        $name=isset($_GET['name']) ? $_GET['name'] : null;

        if ($name == 'customer') {
            $sql = "SELECT * FROM customers";
            $result = $conn->query($sql);
        
            echo "<div><table id='myTable' name='customer'>
            <tr>
                <td>Customer ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>DOB</td>
                <td>Gender</td>
                <td>NIC</td>
                <td>License No</td>
                <td>Address</td>
                <td>Mobile</td>
                <td>Email</td>
                <td>NIC_PDF</td>
                <td>Profile_Image</td>
                <td>Password</td>
                <td>Created_at</td>
                <td>Update</td>
                <td>Delete</td>
            </tr>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>"; // Start a new row
                
                // Form starts here
                echo "<form method='POST' action='editcustomers.php'>";
                
                // Table data (display the customer data)
                echo "<td><input type='text' name='user_id' value='".$row['user_id']."' readonly></td>";
                echo "<td><input type='text' name='first_name' value='".$row['first_name']."'readonly></td>";
                echo "<td><input type='text' name='last_name' value='".$row['last_name']."' readonly></td>";
                echo "<td><input type='date' name='date_of_birth' value='".$row['date_of_birth']."' readonly></td>";
                echo "<td><input type='text' name='gender' value='".$row['gender']."' readonly>
                <div  style='display:none'>
                    <input type='radio' name='gender' value='male'>Male&nbsp
                    <input type='radio' name='gender' value='female'>Female</div></td>";

                echo "<td><input type='text' name='nic_number' value='".$row['nic_number']."' readonly></td>";
                echo "<td><input type='text' name='licence_number' value='".$row['licence_number']."' readonly></td>";
                echo "<td><input type='text' name='address' value='".$row['address']."' readonly></td>";
                echo "<td><input type='tel' name='mobile' value='".$row['mobile']."' readonly></td>";
                echo "<td><input type='email' name='email' value='".$row['email']."' readonly></td>";
                echo "<td><input type='text' name='nic_pdf' value='".$row['nic_pdf']."' readonly></td>";
                echo "<td><input type='text' name='profile_image' value='".$row['profile_image']."' readonly></td>";
                echo "<td><input type='password' name='password' value='".$row['password']."' readonly></td>";
                echo "<td><input type='text' name='created_at' value='".$row['created_at']."' readonly></td>";
                
                // Update and delete buttons
                echo "<td><button type='submit' class='submitBtn' name='submitBtn' value='submit' style='display:none;'>Save</button><button type='button' id='updateBtn'>Update</button></td>";
               
                echo "<td><a href='deleteCustomer.php?user_id=".$row['user_id']."'>Delete</a></td>"; // For now, just a button (implement delete later)
                
                // Form ends here
                echo "</form>";
                
                echo "</tr>";
            }

            echo "</table></div><br><br><a href='customerForm.php'><img src='../img/plusBlue.png' id='insertBtn' alt='insertBtn' height='50' width='50'></a>";
        
        //-------------------------------------------------------------Enter add button-----------------------------------------------------------

        //echo "<span id='addRowButtonCustomer'><img src='../Images/plus.png' height='10%' width='4%' id='I'm image'></span></div>";
        }

        //---------------------------------------------------------Create staff table-------------------------------------------------  
        
        if ($name == 'staff') {
            $sql = "SELECT * FROM staff";
            $result = $conn->query($sql);
        
            echo "<div><table id='myTable' name='staff'>
            <tr>
                <td>StaffID</td>
                <td>NIC</td>
                <td>Bonus</td>
                <td>FirstName</td>
                <td>LastName</td>
                <td>Age</td>
                <td>Address</td>
                <td>Salary</td>
                <td>DOB</td>
                
                <td>Update</td>
                <td>Delete</td>
            </tr>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>"; // Start a new row
                
                // Form starts here
                echo "<form method='POST' action='editstaff.php'>";
                
                // Table data (display the customer data)
                echo "<td><input type='text' name='StaffID' value='".$row['StaffID']."' readonly></td>";
                echo "<td><input type='text' name='NIC' value='".$row['NIC']."'readonly></td>";
                echo "<td><input type='number' name='Bonus' value='".$row['Bonus']."' readonly></td>";
                echo "<td><input type='text' name='FirstName' value='".$row['FirstName']."' readonly></td>";
                echo "<td><input type='text' name='LastName' value='".$row['LastName']."' readonly></td>";
                
                echo "<td><input type='number' name='Age' value='".$row['Age']."' readonly></td>";
                echo "<td><input type='text' name='Address' value='".$row['Address']."' readonly></td>";
                echo "<td><input type='number' name='Salary' value='".$row['Salary']."' readonly></td>";
                echo "<td><input type='date' name='DOB' value='".$row['DOB']."' readonly></td>";
                
                // Update and delete buttons
                echo "<td><button type='submit' class='submitBtn' name='submitBtn' value='submit' style='display:none;'>Save</button><button type='button' id='updateBtn'>Update</button></td>";
               
                echo "<td><a href='deleteStaff.php?StaffID=".$row['StaffID']."'>Delete</a></td>"; // For now, just a button (implement delete later)
                
                
                // Form ends here
                echo "</form>";
                
                echo "</tr>";
            };

            echo "</table></div><br><br><a href='staffForm.php'><img src='../img/plusBlue.png' id='insertBtn' alt='insertBtn' height='50' width='50'></a>";
        }

        //---------------------------------------------------------Create driver table-------------------------------------------------  

        if ($name == 'driver') {
            $sql = "SELECT * FROM driver";
            $result = $conn->query($sql);
        
            echo "<div><table id='myTable' name='driver'>
            <tr>
                <td>DriverID</td>
                <td>StaffID</td>
                <td>LicenseNo</td>
                
                
                <td>Update</td>
                <td>Delete</td>
            </tr>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>"; // Start a new row
                
                // Form starts here
                echo "<form method='POST' action='editdriver.php'>";
                
                // Table data (display the customer data)
                echo "<td><input type='text' name='DID' value='".$row['DID']."' readonly></td>";
                echo "<td><input type='number' name='SID' value='".$row['SID']."'readonly></td>";
                echo "<td><input type='text' name='LicenseNo' value='".$row['LicenseNo']."' readonly></td>";
               
                
                // Update and delete buttons
                echo "<td><button type='submit' class='submitBtn' name='submitBtn' value='submit' style='display:none;'>Save</button><button type='button' id='updateBtn'>Update</button></td>";
               
                echo "<td><a href='deleteDriver.php?DID=".$row['DID']."'>Delete</a></td>"; // For now, just a button (implement delete later)
                
                // Form ends here
                echo "</form>";
                
                echo "</tr>";
            };

            echo "</table></div><br><br><a href='driverForm.php'><img src='../img/plusBlue.png' id='insertBtn' alt='insertBtn' height='50' width='50'></a>";
        }
        

        //---------------------------------------------------------Create rental agent table-------------------------------------------------  

        if ($name == 'rentalagent') {
            $sql = "SELECT * FROM rentalagent";
            $result = $conn->query($sql);
        
            echo "<div><table id='myTable' name='rentalagent'>
            <tr>
                <td>AgentID</td>
                <td>StaffID</td>
        
                
                <td>Update</td>
                <td>Delete</td>
            </tr>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>"; // Start a new row
                
                // Form starts here
                echo "<form method='POST' action='editrentalagent.php'>";
                
                // Table data (display the customer data)
                echo "<td><input type='number' name='AgentID' value='".$row['AgentID']."' readonly></td>";
                echo "<td><input type='number' name='StaffID' value='".$row['StaffID']."'readonly></td>";
                
               
                
                // Update and delete buttons
                echo "<td><button type='submit' class='submitBtn' name='submitBtn' value='submit' style='display:none;'>Save</button><button type='button' id='updateBtn'>Update</button></td>";
               
                echo "<td><a href='deleteAgent.php?AgentID=".$row['AgentID']."'>Delete</a></td>"; // For now, just a button (implement delete later)
                
                // Form ends here
                echo "</form>";
                
                echo "</tr>";
            };

            echo "</table></div><br><br><a href='agentForm.php'><img src='../img/plusBlue.png' id='insertBtn' alt='insertBtn' height='50' width='50'></a>";
        }

        //---------------------------------------------------------Create branch table-------------------------------------------------  

        if ($name == 'branch') {
            $sql = "SELECT * FROM branch";
            $result = $conn->query($sql);
        
            echo "<div><table id='myTable' name='branch'>
            <tr>
                <td>BranchID</td>
                <td>Email</td>
                <td>Address</td>
                <td>Location</td>
        
                
                <td>Update</td>
                <td>Delete</td>
            </tr>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>"; // Start a new row
                
                // Form starts here
                echo "<form method='POST' action='editbranch.php'>";
                
                // Table data (display the customer data)
                echo "<td><input type='number' name='BranchID' value='".$row['BranchID']."' readonly></td>";
                echo "<td><input type='email' name='Email' value='".$row['Email']."'readonly></td>";
                echo "<td><input type='text' name='Address' value='".$row['Address']."'readonly></td>";
                echo "<td><input type='text' name='Location' value='".$row['Location']."'readonly></td>";
                
               
                
                // Update and delete buttons
                echo "<td><button type='submit' class='submitBtn' name='submitBtn' value='submit' style='display:none;'>Save</button><button type='button' id='updateBtn'>Update</button></td>";
               
                echo "<td><a href='deleteBranch.php?BranchID=".$row['BranchID']."'>Delete</a></td>"; // For now, just a button (implement delete later)
                
                // Form ends here
                echo "</form>";
                
                echo "</tr>";
            };

            echo "</table></div><br><br><a href='branchForm.php'><img src='../img/plusBlue.png' id='insertBtn' alt='insertBtn' height='50' width='50'></a>";
        }

        
        //---------------------------------------------------------Create branch contact table-------------------------------------------------  

        if ($name == 'branchcontact') {
            $sql = "SELECT * FROM branchcontact";
            $result = $conn->query($sql);
        
            echo "<div><table id='myTable' name='branchcontact'>
            <tr>
                <td>BranchID</td>
                <td>Telno</td>
        
                
                <td>Update</td>
                <td>Delete</td>
            </tr>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>"; // Start a new row
                
                // Form starts here
                echo "<form method='POST' action='editbranchcontact.php'>";
                
                // Table data (display the customer data)
                echo "<td><input type='number' name='BranchID' value='".$row['BranchID']."' readonly></td>";
                echo "<td><input type='tel' name='Telno' value='".$row['Telno']."'readonly></td>";
                
               
                
                // Update and delete buttons
                echo "<td><button type='submit' class='submitBtn' name='submitBtn' value='submit' style='display:none;'>Save</button><button type='button' id='updateBtn'>Update</button></td>";
               
                echo "<td><a href='deleteBranchContact.php?BranchID=".$row['BranchID']."&Telno=".$row['Telno']."'>Delete</a></td>"; // For now, just a button (implement delete later)
                
                
                // Form ends here
                echo "</form>";
                
                echo "</tr>";
            };

            echo "</table></div><br><br><a href='branchContactForm.php'><img src='../img/plusBlue.png' id='insertBtn' alt='insertBtn' height='50' width='50'></a>";
        }

      

        //---------------------------------------------------------Create customer contact table------------------------------------------------  

        if ($name == 'contact_requests') {
            $sql = "SELECT * FROM contact_requests";
            $result = $conn->query($sql);
        
            echo "<div><table id='myTable' name='contact_requests'>
            <tr>
                <td>ID</td>
                <td>Firstname</td>
                <td>Lastname</td>
                <td>Email</td>
                <td>Message</td>
                <td>created_at</td>
        
                
                <td>Update</td>
                <td>Delete</td>
            </tr>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>"; // Start a new row
                
                // Form starts here
                echo "<form method='POST' action='editcontact_requests.php'>";
                
                // Table data (display the customer data)
                echo "<td><input type='number' name='id' value='".$row['id']."' readonly></td>";
                echo "<td><input type='text' name='firstname' value='".$row['firstname']."'readonly></td>";
                echo "<td><input type='text' name='lastname' value='".$row['lastname']."'readonly></td>";
                echo "<td><input type='email' name='email' value='".$row['email']."'readonly></td>";
                echo "<td><input type='text' name='message' value='".$row['message']."'readonly></td>";
                echo "<td><input type='date' name='created_at' value='".$row['created_at']."'readonly></td>";
                
               
                
                // Update and delete buttons
                echo "<td><button type='submit' class='submitBtn' name='submitBtn' value='submit' style='display:none;'>Save</button><button type='button' id='updateBtn'>Update</button></td>";
               
                echo "<td><a href='deleteContact.php?id=".$row['id']."'>Delete</a></td>"; // For now, just a button (implement delete later)
                
                // Form ends here
                echo "</form>";
                
                echo "</tr>";
            };

            echo "</table></div><br><br><a href='contact_requestsForm.php'><img src='../img/plusBlue.png' id='insertBtn' alt='insertBtn' height='50' width='50'></a>";
        }

        //---------------------------------------------------------Create customer Email table-------------------------------------------------  

        if ($name == 'cusemail') {
            $sql = "SELECT * FROM cusemail";
            $result = $conn->query($sql);
        
            echo "<div><table id='myTable' name='cusemail'>
            <tr>
                <td>CID</td>
                <td>Email</td>
        
                
                <td>Update</td>
                <td>Delete</td>
            </tr>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>"; // Start a new row
                
                // Form starts here
                echo "<form method='POST' action='editcusemail.php'>";
                
                // Table data (display the customer data)
                echo "<td><input type='text' name='CID' value='".$row['CID']."' readonly></td>";
                echo "<td><input type='email' name='Email' value='".$row['Email']."'readonly></td>";
                
               
                
                // Update and delete buttons
                echo "<td><button type='submit' class='submitBtn' name='submitBtn' value='submit' style='display:none;'>Save</button><button type='button' id='updateBtn'>Update</button></td>";
               
                echo "<td><a href='deleteCusemail.php?CID=".$row['CID']."&Email=".$row['Email']."'>Delete</a></td>"; // For now, just a button (implement delete later)
                
                // Form ends here
                echo "</form>";
                
                echo "</tr>";
            };

            echo "</table></div><br><br><a href='customerEmailForm.php'><img src='../img/plusBlue.png' id='insertBtn' alt='insertBtn' height='50' width='50'></a>";
        }


        //---------------------------------------------------------Create payment table-------------------------------------------------  

        
        if ($name == 'payment') {
            $sql = "SELECT * FROM payment";
            $result = $conn->query($sql);
        
            echo "<div><table id='myTable' name='payment'>
            <tr>
                <td>Payment_id</td>
                <td>Firstname</td>
                <td>Lastname</td>
                <td>Email</td>
                <td>Method</td>
                <td>CreditCardNum</td>
                <td>Date</td>
                <td>CVV</td>
                <td>Receipt</td>
                <td>TotalPrice</td>
                <td>Confirmed</td>
        
                
                <td>Update</td>
                <td>Delete</td>
            </tr>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>"; // Start a new row
                
                // Form starts here
                echo "<form method='POST' action='editpayment.php'>";
                
                // Table data (display the customer data)
                echo "<td><input type='number' name='payment_id' value='".$row['payment_id']."' readonly></td>";
                echo "<td><input type='text' name='firstname' value='".$row['firstname']."'readonly></td>";
                echo "<td><input type='text' name='lastname' value='".$row['lastname']."'readonly></td>";
                echo "<td><input type='email' name='email' value='".$row['email']."'readonly></td>";
                echo "<td><input type='text' name='method' value='".$row['method']."'readonly></td>";
                echo "<td><input type='number' name='creditCardNum' value='".$row['creditCardNum']."'readonly></td>";
                echo "<td><input type='date' name='date' value='".$row['date']."'readonly></td>";
                echo "<td><input type='number' name='cvv' value='".$row['cvv']."'readonly></td>";
                echo "<td><input type='text' name='receipt' value='".$row['receipt']."'readonly></td>";
                echo "<td><input type='number' name='totalPrice' value='".$row['totalPrice']."'readonly></td>";
                echo "<td><input type='number' name='confirmed' value='".$row['confirmed']."'readonly></td>";
                
                // Update and delete buttons
                echo "<td><button type='submit' class='submitBtn' name='submitBtn' value='submit' style='display:none;'>Save</button><button type='button' id='updateBtn'>Update</button></td>";
               
                echo "<td><a href='deletePayment.php?payment_id=".$row['payment_id']."'>Delete</a></td>"; // For now, just a button (implement delete later)
                
                // Form ends here
                echo "</form>";
                
                echo "</tr>";

                
            };

            echo "</table></div><br><br><a href='paymentForm.php'><img src='../img/plusBlue.png' id='insertBtn' alt='insertBtn' height='50' width='50'></a>";
        }

        //---------------------------------------------------------Create rental table-------------------------------------------------  

        if ($name == 'rental') {
            $sql = "SELECT * FROM rental";
            $result = $conn->query($sql);
        
            echo "<div><table id='myTable' name='payment'>
            <tr>
                <td>Rental ID</td>
                <td>Reservation ID</td>
                <td>Agent ID</td>
                <td>Journey Status</td>
                
        
                
                <td>Update</td>
                <td>Delete</td>
            </tr>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>"; // Start a new row
                
                // Form starts here
                echo "<form method='POST' action='editrental.php'>";
                
                // Table data (display the customer data)
                echo "<td><input type='number' name='RentalID' value='".$row['RentalID']."' readonly></td>";
                echo "<td><input type='number' name='ReservationID' value='".$row['ReservationID']."'readonly></td>";
                echo "<td><input type='number' name='AgentID' value='".$row['AgentID']."'readonly></td>";
                echo "<td><input type='text' name='JourneyStatus' value='".$row['JourneyStatus']."'readonly></td>";
               
                // Update and delete buttons
                echo "<td><button type='submit' class='submitBtn' name='submitBtn' value='submit' style='display:none;'>Save</button><button type='button' id='updateBtn'>Update</button></td>";
               
                echo "<td><a href='deleteRental.php?RentalID=".$row['RentalID']."'>Delete</a></td>"; // For now, just a button (implement delete later)
                    
                // Form ends here
                echo "</form>";
                
                echo "</tr>";

                
            };

            echo "</table></div><br><br><a href='rentalForm.php'><img src='../img/plusBlue.png' id='insertBtn' alt='insertBtn' height='50' width='50'></a>";
        }

        //---------------------------------------------------------Create reservation table-------------------------------------------------  

        
        if ($name == 'reservation') {
            $sql = "SELECT * FROM reservation";
            $result = $conn->query($sql);
        
            echo "<div><table id='myTable' name='reservation'>
            <tr>
                <td>Booking ID</td>
                <td>Vehicle ID</td>
                <td>Contact No</td>
                <td>Destination</td>
                <td>Start Date</td>
                <td>End Date</td>
                <td>No Of Members</td>
                <td>Additional Note</td>
                <td>Driver Requirement</td>
                
        
                
                <td>Update</td>
                <td>Delete</td>
            </tr>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>"; // Start a new row
                
                // Form starts here
                echo "<form method='POST' action='editreservation.php'>";
                
                // Table data (display the customer data)
                echo "<td><input type='number' name='BookingID' value='".$row['BookingID']."' readonly></td>";
                echo "<td><input type='number' name='vehicleID' value='".$row['vehicleID']."'readonly></td>";
                echo "<td><input type='tel' name='ContactNo' value='".$row['ContactNo']."'readonly></td>";
                echo "<td><input type='text' name='Destination_Purpose' value='".$row['Destination_Purpose']."'readonly></td>";
                echo "<td><input type='datetime-local' name='RentalStratDate_Time' value='".$row['RentalStratDate_Time']."'readonly></td>";
                echo "<td><input type='datetime-local' name='RentalEndDate_Time' value='".$row['RentalEndDate_Time']."'readonly></td>";
                echo "<td><input type='number'' name='NoOfMembers' value='".$row['NoOfMembers']."'readonly></td>";
                echo "<td><input type='text' name='AdditionalNote' value='".$row['AdditionalNote']."'readonly></td>";
                echo "<td><input type='text' name='NeedaDriver' value='".$row['NeedaDriver']."'readonly></td>";
               
                // Update and delete buttons
                echo "<td><button type='submit' class='submitBtn' name='submitBtn' value='submit' style='display:none;'>Save</button><button type='button' id='updateBtn'>Update</button></td>";
               
                echo "<td><a href='deleteReservation.php?BookingID=".$row['BookingID']."'>Delete</a></td>"; // For now, just a button (implement delete later)
                 
                // Form ends here
                echo "</form>";
                
                echo "</tr>";

                
            };

            echo "</table></div><br><br><a href='reservationForm.php'><img src='../img/plusBlue.png' id='insertBtn' alt='insertBtn' height='50' width='50'></a>";
        }


    }
    

    else{
        echo $conn->connect_error;
    }

    ?>




<script src="../JS/addbtn.js"></script>
<script src="../JS/button.js"></script>
</body>

</html>