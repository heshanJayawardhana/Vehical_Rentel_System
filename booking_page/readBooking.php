<?php
    require '../includes/config.php';

    // Inline CSS styling
    echo "<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 18px;
        text-align: left;
    }
    th, td {
        padding: 12px;
        border: 1px solid #ddd;
    }
    th {
        background-color: #4CAF90;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #ddd;
    }
    </style>";

    $sql = "SELECT * FROM reservation";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there is data available
    if($result->num_rows > 0)
    {
        // Create table for data
        echo "<table border='2'>";

        // Table headings
        echo "<tr> 
                <th>BookingID</th>
                <th>Vehicle ID</th>
                <th>Contact No</th>
                <th>Destination Purpose</th>
                <th>Rental Start Date/Time</th>
                <th>Rental End Date/Time</th>
                <th>No. of Members</th>
                <th>Additional Note</th>
                <th>Need a Driver</th>
                <th>Actions</th>
              </tr>";

        // Loop through rows in data table
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["BookingID"]."</td>"
                ."<td>".$row["vehicleID"]."</td>"
                ."<td>".$row["ContactNo"]."</td>"
                ."<td>".$row["Destination_Purpose"]."</td>"
                ."<td>".$row["RentalStratDate_Time"]."</td>"
                ."<td>".$row["RentalEndDate_Time"]."</td>"
                ."<td>".$row["NoOfMembers"]."</td>"
                ."<td>".$row["AdditionalNote"]."</td>"
                ."<td>".$row["NeedaDriver"]."</td>";

            // Add payment link and actions
            echo "<td><a href='../payment/payment.php?amount=".$row["amount"]."'>Pay Now</a></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<a href='deleteform.php'><button>Delete my Bookings</button></a>";
    }
    else
    {
        echo "No Bookings!";
    }

    // Close the connection
    $conn->close();
?>
