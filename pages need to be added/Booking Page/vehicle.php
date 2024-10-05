<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Page</title>
</head>
<body>
    <h1>Select a Vehicle</h1>
    
    <?php
    // Dummy vehicle data
    $vehicles = [
        1 => ['model' => 'Toyota Corolla', 'image' => 'images/car1.jpg', 'id' => 1],
        2 => ['model' => 'Honda Civic', 'image' => 'images/car2.jpg', 'id' => 2],
        3 => ['model' => 'Nissan Altima', 'image' => 'images/car3.jpg', 'id' => 3]
    ];

    // Display vehicle images as links
    foreach ($vehicles as $vehicle) {
        echo '<div style="margin: 20px;">';
        echo '<a href="booking.php?vehicle_id=' . $vehicle['id'] . '">';
        echo '<img src="' . $vehicle['image'] . '" alt="' . $vehicle['model'] . '" width="200">';
        echo '<p>' . $vehicle['model'] . '</p>';
        echo '</a>';
        echo '</div>';
    }
    ?>
</body>
</html>
