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


    $sql = "SELECT *
            FROM reservation";

    //execute query
    $result = $conn->query($sql);


    //check data availble or not 
    if($result->num_rows > 0)
    {
        //create table for data
        echo "<table border='2'>";

        //table headings

        echo    "<tr> 
                    <th>BookingID</th>
                    <th>vehicleID</th>
                    <th>ContactNo</th>
                    <th>Destination_Purpose</th>
                    <th>RentalStratDate_Time</th>
                    <th>RentalEndDate_Time</th>
                    <th>NoOfMembers</th>
                    <th>AdditionalNote</th>
                    <th>NeedaDriver</th>
                </tr>";

        //loop for rows in data table
        while($row = $result->fetch_assoc())    //$results get all data and fetch_assoc() use to get rows by rows 
        {
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
                

            echo "</tr>";

        }

        echo "</table>";
        echo "<a href='deleteform.php'><button>Delete my Bookings</button></a>";
        

    }
    else
    {
        echo "No Bookings !";
    }

    //close connection
    $conn->close();

?>