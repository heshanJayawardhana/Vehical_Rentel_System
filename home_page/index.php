<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Easy Ride Rentals</title>

    <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./home.css" />
    <link rel="stylesheet" href="./slideshow.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="./slideshow.js" defer></script>
    

</head>
<body class="homepage">

    <?php
        include_once "../includes/header.php";
    ?>

    <div class="slideshow-container">
        <!-- Slide 1 -->
        <div class="mySlides fade">
            <img src="images/car8.avif" style="width:100%">
        </div>

        <!-- Slide 2 -->
        <div class="mySlides fade">
            <img src="images/car12.avif" style="width:100%">
        </div>

        <!-- Slide 3 -->
        <div class="mySlides fade">
            <img src="images/t1.jpeg" style="width:100%">
        </div>

        <!-- Slide 4 -->
        <div class="mySlides fade">
            <img src="images/car11.avif" style="width:100%">
        </div>


        <!-- Dots below slideshow -->
        <div class="slideshow-dots">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>


      <!-- Buttons Section -->
    
    <!-- Services Buttons -->
    <div class="service-btn-container">
        <button class="service-btn">Self Drive</button>
        <button class="service-btn">With Driver</button>
        <button class="service-btn">Tours</button>
        <button class="service-btn">Transfers</button>
        <button class="service-btn">Weddings & Events</button>
    </div>

    <!-- Why Choose Us Section -->
    <hr class="hr1">
    <h1 class="why-choose-us">Why Choose Us</h1>
    <div class="special-container">
        <div class="Special">
            <i class="fas fa-star"></i>
            <h3>Ratings</h3>
            <p class="special-para">Customer reviews and high ratings guarantee top-quality service.</p>
        </div>
        <div class="Special">
            <i class="fas fa-tag"></i>
            <h3>Special Prices</h3>
            <p class="special-para">Enjoy exclusive discounts and competitive pricing on rentals.</p>
        </div>
        <div class="Special">
            <i class="fas fa-clock"></i>
            <h3>24/7 Service</h3>
            <p class="special-para">Were available around the clock to assist with your rental needs.</p>
        </div>
        <div class="Special">
            <i class="fas fa-shield-alt"></i>
            <h3>Full Insurance</h3>
            <p class="special-para">Drive with peace of mind with our comprehensive insurance coverage.</p>
        </div>
    </div>

    
    <?php
        include_once "../includes/footer.php";
    ?>

</body>
</html>


