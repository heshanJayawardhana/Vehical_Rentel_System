<?php
include("readProf.php");
?>


<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">

    <head>
        <title>User Account - EasyRide.com</title>

        <link rel="stylesheet" href="../CSS/styles.css">
    </head>

    <body>
        <header>

            <img class="image-slider active" src="../Image/aqua.jpg" alt="img1">  <!--To set the current image visible-->
            <img class="image-slider" src="../Image/benz.jpg" alt="img2">  <!--To set the other images invisible until they are active-->
            <img class="image-slider" src="../Image/caravan.jpg" alt="img3">
            <img class="image-slider" src="../Image/benz2.webp" alt="img4">
            <img class="image-slider" src="../Image/civic2.jpg" alt="img5">
            <img class="image-slider" src="../Image/civilian.jpg" alt="img6">
            <img class="image-slider" src="../Image/leaf.jpg" alt="img7">
            <img class="image-slider" src="../Image/kdh.jpg" alt="img8">
            <img class="image-slider" src="../Image/luxury.jpg" alt="img9">
            <img class="image-slider" src="../Image/noah.jpeg" alt="img10">
            <img class="image-slider" src="../Image/oldsunny.jpg" alt="img11">
            <img class="image-slider" src="../Image/outlander.jpg" alt="img11">

            <script src="../js/image slider.js"></script> <!--to set image transitions-->  

        <div id="ride">
            <img src="../images/logo.jpeg" alt="logo" height="50" width="50" >&nbsp
            <a href="www.EasyRide.com" >EasyRide.com</a>
        </div>


            
            <center><h1>Welcome back!</h1></center>

            <div class="profile">

            <a href="#useraccount"><img src="../images/profile temp.avif" alt="profile" height="50" width="50"></a>

            <button type="button" id="logout"><a href="#home">Log Out</a></button>

            </div><br><br><br><br>

            <ul id="navbar">
                <li><a href="#home">Home</a></li>
                <li><a href="#vehicles">Vehicles</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#view">View</a></li>
                <li><a href="#contactus">Contact Us</a></li>
                <li><a href="#help">Help</a></li>
            </nav>

        </header>

        
        <div style="position:relative;">
        <div>
            <table style="width:60%;">
                <!-- specify the width of each column-->
                <colgroup>
                    <col class="firstCol">
                    <col class="secCol" style="width:40%;">
                    <col class="thirdCol" style="width:30%;background-color:rgb(221, 249, 249);">
                    <col class="fourthCol">
                    <col class="fifthCol" style="width:25%;">
                </colgroup>
                <!--Group the first  row of the table-->
                <thead>
                <tr>
                    <th  colspan="5" style="font-size:20px;text-align:center;font-style:italic;color:white;padding:5%;background-color:rgb(4, 6, 46);">Account Detailsssssssssssssssssssssssssssssssssssssssssssssssssssssssssss</th>

                </tr>
                </thead>

                <tr>
                       
                    <td class="colA">Name:</td><td class="colB"><input type="text" name="name" value="<?php echo htmlspecialchars($cleaned_values['FirstName'].' '.$cleaned_values['LastName']); ?>" disabled></td>
                    <td rowspan="5" style="width:10%"><center><img src="../Image/woman.png" alt="profile" height="150" width="100"></td></center>
                    <td class="colA">Gender </td><td class="colB"><?php echo htmlspecialchars($cleaned_values['gender']); ?></td>

                </tr>
                <tr>
                       
                    <td class="colA">Username </td><td><input type="text" name="name" value="gggggggggggggggggggggggggggggggg" disabled></td>
                    <td class="colA">Password </td><td><input type="text" name="name" value="gggggggggggggggggggggggggggggggg" disabled></td>

                </tr>
                <tr>
                       
                    <td class="colA">DOB </td><td><input type="text" name="name" value="gggggggggggggggggggggggggggggggg" disabled></td>
                    <td class="colA">age </td><td><input type="text" name="name" value="gggggggggggggggggggggggggggggggg" disabled></td>

                </tr>
                <tr>
                       
                    <td class="colA">Tel No </td><td><input type="text" name="name" value="gggggggggggggggggggggggggggggggg" disabled></td>
                    <td class="colA">Email </td><td><input type="text" name="name" value="gggggggggggggggggggggggggggggggg" disabled></td>

                </tr>
                <tr>
                       
                    <td class="colA">Address </td><td><input type="text" name="name" value="gggggggggggggggggggggggggggggggg" disabled></td>
                    <td class="colA" colspan="2"><button class="edit_button">Edit</button></td>

                </tr>
            </table>
        </div>

        <div class="ImageButton">

            <div id="pair" style="margin-left:25px">
                <a href="#">
                <img src="../Image/past_activity.png" width="50" height="50" ><br>
                <br>Past Activity</a><br><br>
        
            </div>
        
            <div id="pair">
                <a href="#">
                <img src="../Image/current_activity.png" width="50" height="50"><br>
                <br>Current Activity</a><br><br>
        
            </div>
        
            <div id="pair">
                <a href="#">
                <img src="../Image/fav_rides.png" width="50" height="50"><br>
                <br>Favourite Rides</a><br><br>
        
        
            </div>
        
            <div id="pair" style="margin-left:25px">
        
                <a href="#">
                <img src="../Image/fav_drivers.png" width="50" height="50"><br>
                <br>Favourite Drivers</a><br><br>
        
            </div>
        
            <div id="pair">
                <a href="#">
                <img src="../Image/payment.png" width="50" height="50"><br>
                <br>Payment History</a><br><br>
        
            </div>
        
            <div id="pair">
                <a href="#">
                <img src="../Image/fav_destinations.png" width="50" height="50"><br>
                <br>Favourite Destinations</a><br><br>
        
            </div>
        </div>
    </div>

        
    </body>


</html>

