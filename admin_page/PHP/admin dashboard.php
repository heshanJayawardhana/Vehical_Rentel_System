<?php
// Link the configuration file
require_once '../../includes/config.php';

?>

<html>
<head>


    <style>
         body {
            background-color: rgb(96, 203, 239);
            background-image: url('../img/carwall.jpg'); /* Path to your image */
            background-size: cover; /* Ensures the image covers the entire area */
            background-position: right; /* Centers the image */
            background-repeat: no-repeat; /* Prevents the image from repeating */
            background-blend-mode: overlay; /* Blends the image with the background color */
            opacity: 0.9; /* Makes the image slightly transparent for a smoother blen*/
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

        header {
            width: 100% !important;
        }

        footer {
            width: 100% !important;
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
            position: relative;
            /* top: 25%; */
            width: fit-content;
            margin-top: 25px;
            animation:sidebars-animation 1s forwards;
            
            /*transform: translate(-50%, -50%);*/
        }

        

        /* Toggle hidden items
        #accounts:hover + .hide {
            display: block; 
        }*/
    </style>
</head>
<body>

<?php 
include './admin_header.php';
?>
    <!-- Create the profile of the admin -->
    <div class="profile">

       <!--WELCOME msg
        <span class="large-text">WELCOME</span>--->


        
        <h1>Welcome IT Administrator</h1>
    
    </div>

    <!-- Sidebars -->
    <div class="side">
        

        <!-- Hidden sections initially, displayed when hovering over the accounts button -->
        <div class="options" id="customer"><a href="readtablesnew.php?name=customer">Customers</a></div>
        <div class="options" id="driver"><a href="readtablesnew.php?name=driver">Drivers</div>
        <div class="options" id="rentalagent"><a href="readtablesnew.php?name=rentalagent">Rental Agents</div>
        <div class="options " id="staff"><a href="readtablesnew.php?name=staff">Staff</div>
        <div class="options" id="reservation"><a href="readtablesnew.php?name=reservation">Reservations</div>
        <div class="options" id="rental"><a href="readtablesnew.php?name=rental">Rentals</div>
        <div class="options " id="payment"><a href="readtablesnew.php?name=payment">Payments</div>
        <div class="options " id="contact_requests"><a href="readtablesnew.php?name=contact_requests">Customer Contacts</div>
        <div class="options " id="cusemail"><a href="readtablesnew.php?name=cusemail">Customer Emails</div>
        <div class="options " id="branch"><a href="readtablesnew.php?name=branch">Branch</div>
        <div class="options " id="branchcontact"><a href="readtablesnew.php?name=branchcontact">Branch Contacts</div>
       
    </div>

<?php 
    include './admin_footer.php';
?>


</body>
</html>
