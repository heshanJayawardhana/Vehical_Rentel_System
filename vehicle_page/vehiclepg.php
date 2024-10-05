<!DOCTYPE html>
<html>
<head>
    <title>Our vehicles</title>
    <link rel = "stylesheet" href="vehicle.css">
</head>
<body>
    
    <?php

        include '../includes/config.php';

        include '../includes/header.php';
    ?>

    <div class = "para1">
        <h1>Make Your Trip More</h1>
         <h1>Enjoyable.. </h1> 
         <p>losem yohshmiag hroeafofngso...</p>
    </div>
    <main>
         <section class="hero-image">
            <img src="./image/photo2.jpg" alt="Hero Image">
         </section>
        <p class = "para2">
            Lorem ipsum dolor sit amet..Lorem ipsum dolor sit amet..
            Lorem ipsum dolor sit amet..Lorem ipsum dolor sit amet..Lorem ipsum dolor sit amet..
            Lorem ipsum dolor sit amet..Lorem ipsum dolor sit amet..Lorem ipsum dolor sit amet..
        </p>

       
        <h2 style="text-align: center;">Book Your Ride Today.</h2>
        
        <section class="product">
            
        <?php
// Assuming you've already established the database connection ($conn)

// Get unique vehicle types
$vehicle_types_sql = "SELECT DISTINCT type FROM vehicle";
$vehicle_types_result = $conn->query($vehicle_types_sql);

$vehicle_types = [];

if ($vehicle_types_result->num_rows > 0) {
    while ($type_data = $vehicle_types_result->fetch_assoc()) {
        $vehicle_types[] = $type_data['type'];
    }
}

foreach ($vehicle_types as $car_type) {
    echo '
        <div class="product_list">
            <h2 class="product-category">' . $car_type . '</h2>
            <div class="product-container">
    ';

    $car_stmt = $conn->prepare("SELECT * FROM vehicle WHERE type = ?");
    $car_stmt->bind_param("s", $car_type);
    $car_stmt->execute();
    $car_details = $car_stmt->get_result();

    if ($car_details->num_rows > 0) {
        while ($car = $car_details->fetch_assoc()) {
            echo '
                <div class="product-card">
                    <div class="product-image">
                        <img src="' . $car['vehicle_img'] . '" class="product-thumb" alt="">
                         <a class="card-btn" href="../booking_page/booking.php?carID='.$car['vehicleID'].'">Book Now!</a>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">' . $car['brand'] . '</h2>
                        <p class="product-short-description">' . $car['features'] . '</p>
                    </div>
                </div>
            ';
        }
    } else {
        echo '<p>No vehicles available for this type.</p>';
    }

    echo '
            </div>
        </div>
    ';
}
?>
     

            ?>
            
        </section>

    <script src="./vehicle.js"></script>
              
          
    <?php
        include '../includes/footer.php';
    ?>
    
        <script src="./vehicle.js"></script>
 </body>
 
 </html>