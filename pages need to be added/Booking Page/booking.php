<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Example credentials
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Dummy data for demonstration (you should fetch this from your database)
    if ($username === 'user' && $password === 'pass') {
        $_SESSION['user_id'] = $username; // Store user ID in session
        header('Location: booking.php'); // Redirect to the booking page
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EasyRide</title>
    <link rel="stylesheet" type="text/css" href="./booking.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .hidden { display: none; }
    </style>

    <script src="./booking.js"></script>
    <script src="./validation.js"></script>

    <style>
        .price-table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 30px;
            margin-left: 8px;
        }
        .price-table th, .price-table td {
            border: 1px solid #676fb8;
            padding: 8px;
            text-align: center;
            font-weight: bolder;
        }
        .price-table th {
            background-color: #676fb8;
            color: #ffffff;;
        }
        .info-vehicle{
            width: 500px;
            position: relative;
        }
    </style>

</head>

<body class="booking">

<div class="header">

    <div class="profile-logo">
        <i class="fas fa-user-circle"></i>
        <button class="signOut-btn">Sign Out</button>
    </div>

</div>

    <h1 class="top">Experience Freedom on Wheels!</h1>
    <br><br>

<div class="whole-form">
        <div class="info-vehicle">
<!--vehicle details-->   
<?php
    
    $vehicles = [
        1 => ['model' => 'Toyota Corolla', 'image' => 'images/car1.jpg', 'id' => 1001, 'features' => '<ul><li>GPS</li><li>Parking Sensors</li><li>USB Ports</li><li> Air Conditioning</li></ul>', 'price' => 3000],
        2 => ['model' => 'Honda Civic', 'image' => 'images/car2.jpg', 'id' => 1002, 'features' => '<ul><li>Leather Seats</li><li>Blind-Spot Monitoring</li><li>Navigation System</li><li> Bluetooth</li></ul>', 'price' => 4000],
        3 => ['model' => 'Nissan Altima', 'image' => 'images/car3.jpg', 'id' => 1003, 'features' => '<ul><li>Backup Camera</li><li>Alloy Wheels </li><li>Sunroof</li></ul>', 'price' => 5000]
    ];

    // Get the vehicle ID from the query string
    if (isset($_GET['vehicle_id']) && isset($vehicles[$_GET['vehicle_id']])) {
        $vehicle_id = $_GET['vehicle_id'];
        $vehicle = $vehicles[$vehicle_id];

        // Display the vehicle details
        echo '<div>';
        echo '<img src="' . $vehicle['image'] . '" alt="Selected Vehicle" width="400">.';
        echo '<h2>Vehicle ID: ' . $vehicle['id'] . '</h2>';
        echo '<h3>Model: ' . $vehicle['model'] . '</h3>';
       
        
        // Price Table
        echo '<table class="price-table" >';
        echo '<tr>';
        echo '<th>Duration</th>';
        echo '<th>Price (LKR)</th>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>1 Day</td>';
        echo '<td>' . $vehicle['price'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>1 Week</td>';
        echo '<td>' . ($vehicle['price'] * 7) . '</td>'; // 7 days
        echo '</tr>';
        echo '<tr>';
        echo '<td>1 Month</td>';
        echo '<td>' . ($vehicle['price'] * 30) . '</td>'; // 30 days
        echo '</tr>';
        echo '<tr>';
        echo '<td>3 Months</td>';
        echo '<td>' . ($vehicle['price'] * 90) . '</td>'; // 90 days
        echo '</tr>';
        echo '</table>';
        echo '<br>';
        echo '<br>';

        echo '</div>';
    } else {
        echo '<p>No vehicle selected.</p>';
    }
    echo '<h4><u>Special Features: </u>'."<br/>". $vehicle['features']."<br/> " ."<br/> ". '</h4>';
    ?>


</div>

<div class="form-content">

    <div class="btn-container">
        
        <button class="btn1" id="planTripButton">Plan Your Trip</button>
        <button  class="btn1" id="updateBookingButton">Update Booking</button>
        <a href="readBooking.php"><button  class="btn1" id="myBookingButton">My Bookings</button></a>
    </div>
        <br><br>
            
            <div id="planTripForm" class="hidden">
                <form id="bookingForm" action="planTrip_process.php" method="POST" onsubmit="return validateForm(this);">

                <h3>Plan Your Trip </h3>

                Booking ID:
                <input type="text" name="bid" disabled><br><br>

                VehicleID:
                <input type="text" name="vId" ><br><br>

                Contact Number:
                <input type="tel" name="phone" maxlength="10" pattern="\d{10}" placeholder="+94 8979 879"><br><br>

                Destination/Purpose:
                <input type="text" name="destination" placeholder="Colombo to kandy" required><br><br>

                <label for="start_date" >Rental Strat Date & Time:</lable>
                <input type="datetime-local"  name="start_date" id="pickup_date" onchange="calculateTotalAmount()" required><br><br>
               
                <label for="return_date">Rental End Date:</label>
                <input type="datetime-local" name="return_date" id="return_date" onchange="calculateTotalAmount()" required><br><br>

                No Of Members:
                <input type="number" name="numberofMembers" required><br><br>

                Additional Note:
                <textarea  rows="4" cols="35" name = "addnote" placeholder="Note"></textarea><br><br>

                Do you want a driver? 
                <input type="radio" name="driver" value="yes" onclick="calculateTotalAmount()"> Yes
                <input type="radio" name="driver" value="no" checked onclick="calculateTotalAmount()"> No
                <br><br>


                <div id="total_amount" style="margin-top: 20px; font-size: 18px; font-weight: bold;">
                    
                </div>

                <input type="checkbox" id="chkBox" onclick="enableButton()">We charge Rs.100 for every additional kilometer exceeded.
                <br><br>
                <input type="submit" value="Rent" id="submitbtn" class="rent" disabled >
                <button class="paid-btn">Paid</button>
                </form>
            </div>
            
        
            <div id="updateBookingForm" class="hidden">
                <form id="bookingForm" action="updateBooking.php" method="POST"  onsubmit="return validateForm(this);">

                <h3>Update Booking Form</h3>
                Booking ID:
                <input type="text" name="bid" require><br><br>

                VehicleID:
                <input type="text" name="vId" ><br><br>

                Contact Number:
                <input type="tel" name="phone" maxlength="10" pattern="\d{10}" placeholder="+94 8979 879"><br><br>

                Destination/Purpose:
                <input type="text" name="destination" placeholder="Destination" required><br><br>

                <label for="start_date" >Rental Strat Date & Time:</lable>
                <input type="datetime-local"  name="start_date" id="pickup_date" onchange="calculateTotalAmount()" required><br><br>
               
                <label for="return_date">Rental End Date:</label>
                <input type="datetime-local" name="return_date" id="return_date" onchange="calculateTotalAmount()" required><br><br>

                No Of Members:
                <input type="number" name="numberofMembers" required><br><br>

                Additional Note:
                <textarea  rows="4" cols="35" name ="addnote" placeholder="Note"></textarea><br><br>

                Do you want a driver? 
                <input type="radio" name="driver" value="yes" onclick="calculateTotalAmount()"> Yes
                <input type="radio" name="driver" value="no" checked onclick="calculateTotalAmount()"> No
                <br><br>


                <div id="total_amount" style="margin-top: 20px; font-size: 18px; font-weight: bold;">
                    
                </div>

                <input type="checkbox" id="chkBox2" onclick="enableButton2()">We charge Rs.100 for every additional kilometer exceeded.
                <br><br>
                <input type="submit" value="update" id="submitbtn" class="rent" disabled >
                </form>
            </div>
</div>

</div><!--whole-form end-->

 <!--Footer-->
   

</body>

</html>

