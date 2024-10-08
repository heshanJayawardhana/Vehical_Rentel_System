<?php
// Link the configuration file
require_once '../../includes/config.php';

?>

<html>
<head>


    <style>
        body {
            background-color: rgb(96, 203, 239);
        }

        @keyframes profile-animation {
            from {left: 0px; top: 0px;}
            to {left: 350px; top: 0px;}
        }

        @keyframes sidebars-animation {
            from {left: 0px;}
            to {left:10px;}
        }

        a{
            text-decoration:none;
            color:inherit;
        }



        /* Style the admin profile */
        .profile {
            border-radius: 15px 50px 30px;
            background-color: rgb(96, 239, 198);
            width: 45%;
            text-align: center;
            animation-name: profile-animation;
            animation-duration: 1s;
            animation-timing-function: ease;
            position: relative;
            animation-fill-mode: forwards;
            color: white;
            margin: 0 auto; /* Center the profile box */
            padding: 20px;
        }

        /* Welcome text large size */
        .large-text {
            font-size: 48px; /* Adjusted size */
            line-height: 1.2; /* Adjust to span the height of both lines */
            display: block;
            position:absolute;
            top:25%;
            
        }

        /* Name and job title */
        .medium-text {
            font-size: 24px;
            display: block;
            margin-top: 10px;
            
            
            
        }

        h4 {
            font-size: 18px;
            margin: 0;
        }

        /* Sidebar options */
        .options {
            border-radius: 15px 50px 30px 5px;
            /*background-image: linear-gradient(to right, pink, yellow);*/
            color: white;
            font-size: 24px;
            height: 50px;
            width: 500px;
            text-align: center;
            margin: 2px;
            padding: 10px;
            cursor: pointer;
            transition:width 1s;
            background-color:rgb(241, 128, 128);
        }

        .options:hover{
            width:600px;
        }
        .side {
            position: absolute;
            top: 25%;
            animation:sidebars-animation 1s forwards;
            
            /*transform: translate(-50%, -50%);*/
        }

        /* Hide initially */
        .hide {
            display: none;
        }

        /* Toggle hidden items
        #accounts:hover + .hide {
            display: block; 
        }*/
    </style>
</head>
<body>
    <!-- Create the profile of the admin -->
    <div class="profile">

       <!--WELCOME msg--->
        <span class="large-text">WELCOME</span>


        <span class="medium-text">Nuwan Perera</span>
        <h4>IT Administrator</h4>
    
    </div>

    <!-- Sidebars -->
    <div class="side">
        <div class="options" id="accounts">Manage Accounts</div>

        <!-- Hidden sections initially, displayed when hovering over the accounts button -->
        <div class="options hide" id="customer"><a href="readtablesnew.php?name=customer">Customers</a></div>
        <div class="options hide" id="driver"><a href="readtablesnew.php?name=driver">Drivers</div>
        <div class="options hide" id="rentalagent"><a href="readtablesnew.php?name=rentalagent">Rental Agents</div>
        <div class="options hide" id="vehicleowner"><a href="readtablesnew.php?name=vehicleowner">Vehicle Owners</div>
        <div class="options hide" id="staff"><a href="readtablesnew.php?name=staff">Staff</div>
        <div class="options hide" id="reservation"><a href="readtablesnew.php?name=reservation">Reservations</div>
        <div class="options hide" id="rental"><a href="readtablesnew.php?name=rental">Rentals</div>
        <div class="options hide" id="payment"><a href="readtablesnew.php?name=payment">Payments</div>
        <div class="options hide" id="contact_requests"><a href="readtablesnew.php?name=contact_requests">Customer Contacts</div>
        <div class="options hide" id="cusemail"><a href="readtablesnew.php?name=cusemail">Customer Emails</div>
        <div class="options hide" id="branch"><a href="readtablesnew.php?name=branch">Branch</div>
        <div class="options hide" id="branchcontact"><a href="readtablesnew.php?name=branchcontact">Branch Contacts</div>
        <div class="options" style="background-color:rgb(201, 118, 191);">View User Reviews</div>
    </div>


    <script src="../JS/accountTypes.js"></script>
</body>
</html>
