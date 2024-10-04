<?php
require_once '../../PHP/config.php';

/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/



echo "Hi";

// Read the incoming JSON data
$data = json_decode(file_get_contents('php://input'), true);


//file_put_contents('log.txt', print_r($data, true)); // Log incoming data
// Make sure table name and data are received
if (!empty($data['tableName']) && !empty($data['data'])) {
    echo "Hi2";
    $tableName = $data['tableName'];  // Get the table name from JSON data
    $rowData = $data['data'];

    if($tableName == 'customer'){

    // Create a prepared SQL statement dynamically using the table name
    $stmt = $con->prepare("INSERT INTO customer (CusID, FirstName, Lastname, Username, Password, NIC, Gender, DOB, Address, Bio, Profile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssssssss", $rowData[0], $rowData[1], $rowData[2], $rowData[3], $rowData[4], $rowData[5], $rowData[6], $rowData[7], $rowData[8], $rowData[9], $rowData[10]);

    echo $rowData[0]."<br>";
    echo $rowData[1]."<br>";
    echo $rowData[2]."<br>";
    echo $rowData[3]."<br>";
    echo $rowData[4]."<br>";
    echo $rowData[5]."<br>";
    echo $rowData[6]."<br>";
    echo $rowData[7]."<br>";
    echo $rowData[8]."<br>";
    echo $rowData[9]."<br>";
    echo $rowData[10]."<br>";

    // Execute statement and check for success
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Data saved successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error saving data: " . $stmt->error]);
    }

    // Close statement and connection
    $stmt->close();
}

if($tableName == 'staff'){

    // Create a prepared SQL statement dynamically using the table name
    $stmt = $con->prepare("INSERT INTO staff (StaffID, NIC, Bonus, FirstName, LastName, Age, Address, Salary, DOB) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isdssisis", $rowData[0], $rowData[1], $rowData[2], $rowData[3], $rowData[4], $rowData[5], $rowData[6], $rowData[7], $rowData[8]);

    // Execute statement and check for success
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Data saved successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error saving data: " . $stmt->error]);
    }

    // Close statement and connection
    $stmt->close();
}

if($tableName == 'driver'){

    // Create a prepared SQL statement dynamically using the table name
    $stmt = $con->prepare("INSERT INTO driver (DriverID, StaffID, LisenceNo) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $rowData[0], $rowData[1], $rowData[2]);

    // Execute statement and check for success
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Data saved successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error saving data: " . $stmt->error]);
    }

    // Close statement and connection
    $stmt->close();
}

if($tableName == 'rentalagent'){

    // Create a prepared SQL statement dynamically using the table name
    $stmt = $con->prepare("INSERT INTO rentalagent (AgentID, StaffID) VALUES (?, ?)");
    $stmt->bind_param("ii", $rowData[0], $rowData[1]);

    // Execute statement and check for success
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Data saved successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error saving data: " . $stmt->error]);
    }

    // Close statement and connection
    $stmt->close();
}


if($tableName == 'branch'){

    // Create a prepared SQL statement dynamically using the table name
    $stmt = $con->prepare("INSERT INTO branch (BranchID, Email,Address,Location) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $rowData[0], $rowData[1], $rowData[2], $rowData[3]);

    // Execute statement and check for success
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Data saved successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error saving data: " . $stmt->error]);
    }

    // Close statement and connection
    $stmt->close();
}


if($tableName == 'branchcontact'){

    // Create a prepared SQL statement dynamically using the table name
    $stmt = $con->prepare("INSERT INTO branchcontact (BranchID, Telno) VALUES (?, ?)");
    $stmt->bind_param("is", $rowData[0], $rowData[1]);

    // Execute statement and check for success
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Data saved successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error saving data: " . $stmt->error]);
    }

    // Close statement and connection
    $stmt->close();
}


if($tableName == 'cuscontact'){

    // Create a prepared SQL statement dynamically using the table name
    $stmt = $con->prepare("INSERT INTO cuscontact (CID, Tel) VALUES (?, ?)");
    $stmt->bind_param("is", $rowData[0], $rowData[1]);

    // Execute statement and check for success
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Data saved successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error saving data: " . $stmt->error]);
    }

    // Close statement and connection
    $stmt->close();
}


if($tableName == 'cusemail'){

    // Create a prepared SQL statement dynamically using the table name
    $stmt = $con->prepare("INSERT INTO cusemail (CID, Email) VALUES (?, ?)");
    $stmt->bind_param("is", $rowData[0], $rowData[1]);

    // Execute statement and check for success
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Data saved successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error saving data: " . $stmt->error]);
    }

    // Close statement and connection
    $stmt->close();
}

if($tableName == 'payment'){

    // Create a prepared SQL statement dynamically using the table name
    $stmt = $con->prepare("INSERT INTO payment (PaymentID, RentalID, PaymentStatus, Amount, Method, Date) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisdss", $rowData[0], $rowData[1],$rowData[2],$rowData[3],$rowData[4],$rowData[5]);

    // Execute statement and check for success
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Data saved successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error saving data: " . $stmt->error]);
    }

    // Close statement and connection
    $stmt->close();
}

if($tableName == 'rental'){

    // Create a prepared SQL statement dynamically using the table name
    $stmt = $con->prepare("INSERT INTO rental (RentalID, ReservationID, AgentID, JourneyStatus, PaymentStatus) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiss", $rowData[0], $rowData[1],$rowData[2],$rowData[3],$rowData[4]);

    // Execute statement and check for success
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Data saved successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error saving data: " . $stmt->error]);
    }

    // Close statement and connection
    $stmt->close();
}


if($tableName == 'reservation'){

    // Create a prepared SQL statement dynamically using the table name
    $stmt = $con->prepare("INSERT INTO reservation (ReservationID, CID, BranchID, Destination, NoOfAdults, NoOfChildren, PickupTime, ReturnTime, PickupDate, ReturnDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiisiissss", $rowData[0], $rowData[1],$rowData[2],$rowData[3],$rowData[4],$rowData[5],$rowData[6],$rowData[7],$rowData[8],$rowData[9]);

    // Execute statement and check for success
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Data saved successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error saving data: " . $stmt->error]);
    }

    // Close statement and connection
    $stmt->close();
}

} else {
    echo json_encode(["status" => "error", "message" => "No table name or data received"]);
}

$con->close();
?>




