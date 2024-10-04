<?php
// Include database configuration file
require_once '../../PHP/config.php';

// Get the raw POST data and decode the JSON
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    
    $customerID = isset($data['CID']) ? $data['CID'] : null;   // Extract customer ID from the received data
    $driverID = isset($data['driverID']) ? $data['driverID'] : null;
    $branchID = isset($data['branch_id']) ? $data['branch_id'] : null;
    $paymentID = isset($data['payment_id']) ? $data['payment_id'] : null;
    $rentalID = isset($data['rental_id']) ? $data['rental_id'] : null;
    $reservationID = isset($data['reservation_id']) ? $data['reservation_id'] : null;

    


    //----------------------------------------------------------Update customer data-----------------------------------------------------------------------------------------


    // Ensure that customer ID is present
    if ($customerID !== null) {
        // Prepare the SQL query with placeholders for updates
        $sql = "UPDATE customer SET 
                FirstName = ?, 
                LastName = ?, 
                Username = ?, 
                Password = ?, 
                NIC = ?, 
                Gender = ?, 
                DOB = ?, 
                Address = ?, 
                Bio = ?, 
                Profile = ? 
                WHERE CusID = ?";

        // Prepare the statement
        if ($stmt = $con->prepare($sql)) {
            // Bind the parameters from the received data to the SQL query
            
            $stmt->bind_param("ssssssssssi", 
                $data[1], // FirstName
                $data[2], // LastName
                $data[3], // Username
                $data[4], // Password
                $data[5], // NIC
                $data[6], // Gender
                $data[7], // DOB
                $data[8], // Address
                $data[9], // Bio
                $data[10], // Profile
                $customerID // CustomerID (as the condition)
            );

            // Execute the statement
            if ($stmt->execute()) {
                // Send success response
                echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
            } else {
                // Send error response
                echo json_encode(['status' => 'error', 'message' => 'Failed to update record']);
            }

            // Close the statement
            $stmt->close();
        } else {
            // If preparing the statement fails, send an error
            echo json_encode(['status' => 'error', 'message' => 'Failed to prepare the SQL statement']);
        }


    } 

    //----------------------------------------------------------Update driver data-----------------------------------------------------------------------------------------


    // Ensure that driver ID is present
    if ($driverID !== null) {
        // Prepare the SQL query with placeholders for updates
        $sql = "UPDATE driver SET 
                StaffID = ?, 
                LisenceNo = ?  
                WHERE DriverID = ?";

        // Prepare the statement
        if ($stmt = $con->prepare($sql)) {
            // Bind the parameters from the received data to the SQL query
            
            $stmt->bind_param("isi", 
                $data[1], // staffID
                $data[2], // LisenceNo
                
                $driverID // driver (as the condition)
            );

            // Execute the statement
            if ($stmt->execute()) {
                // Send success response
                echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
            } else {
                // Send error response
                echo json_encode(['status' => 'error', 'message' => 'Failed to update record']);
            }

            // Close the statement
            $stmt->close();
        } else {
            // If preparing the statement fails, send an error
            echo json_encode(['status' => 'error', 'message' => 'Failed to prepare the SQL statement']);
        }


    }
    //----------------------------------------------------------Update branch data-----------------------------------------------------------------------------------------

    // Ensure that branch ID is present
    if ($branchID !== null) {
        // Prepare the SQL query with placeholders for updates
        $sql = "UPDATE branch SET 
                Email = ?, 
                Address = ?,
                Location = ?  
                WHERE BranchID = ?";

        // Prepare the statement
        if ($stmt = $con->prepare($sql)) {
            // Bind the parameters from the received data to the SQL query
            
            $stmt->bind_param("sssi", 
                $data[1], // Email
                $data[2], // Address
                $data[3], // Location
                $branchID // branchID (as the condition)
            );

            // Execute the statement
            if ($stmt->execute()) {
                // Send success response
                echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
            } else {
                // Send error response
                echo json_encode(['status' => 'error', 'message' => 'Failed to update record']);
            }

            // Close the statement
            $stmt->close();
        } else {
            // If preparing the statement fails, send an error
            echo json_encode(['status' => 'error', 'message' => 'Failed to prepare the SQL statement']);
        }


    }
    
    
    //----------------------------------------------------------Update payment data-----------------------------------------------------------------------------------------

    // Ensure that branch ID is present
    if ($paymentID !== null) {
        // Prepare the SQL query with placeholders for updates
        $sql = "UPDATE payment SET 
                RentalID = ?, 
                PaymentStatus = ?,
                Amount = ?,
                Method = ?,
                Date = ?  
                WHERE PaymentID = ?";

        // Prepare the statement
        if ($stmt = $con->prepare($sql)) {
            // Bind the parameters from the received data to the SQL query
            
            $stmt->bind_param("isdssi", 
                $data[1], // RentalID
                $data[2], // PaymentStatus
                $data[3], // Amount
                $data[4], // Method
                $data[5], // Date
                $paymentID // paymentID (as the condition)
            );

            // Execute the statement
            if ($stmt->execute()) {
                // Send success response
                echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
            } else {
                // Send error response
                echo json_encode(['status' => 'error', 'message' => 'Failed to update record']);
            }

            // Close the statement
            $stmt->close();
        } else {
            // If preparing the statement fails, send an error
            echo json_encode(['status' => 'error', 'message' => 'Failed to prepare the SQL statement']);
        }


    }
    
    

    //----------------------------------------------------------Update rental data-----------------------------------------------------------------------------------------

    // Ensure that rental ID is present
    if ($rentalID !== null) {
        // Prepare the SQL query with placeholders for updates
        $sql = "UPDATE rental SET 
                ReservationID = ?, 
                AgentID = ?,
                JourneyStatus = ?,
                PaymentStatus = ?
                WHERE RentalID = ?";

        // Prepare the statement
        if ($stmt = $con->prepare($sql)) {
            // Bind the parameters from the received data to the SQL query
            
            $stmt->bind_param("iissi", 
                $data[1], // ReservationID
                $data[2], // AgentID
                $data[3], // JourneyStatus
                $data[4], // PaymentStatus
                
                $rentalID // RentalID (as the condition)
            );

            // Execute the statement
            if ($stmt->execute()) {
                // Send success response
                echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
            } else {
                // Send error response
                echo json_encode(['status' => 'error', 'message' => 'Failed to update record']);
            }

            // Close the statement
            $stmt->close();
        } else {
            // If preparing the statement fails, send an error
            echo json_encode(['status' => 'error', 'message' => 'Failed to prepare the SQL statement']);
        }


    }

    //----------------------------------------------------------Update reservation data-----------------------------------------------------------------------------------------

    // Ensure that ReservationID is present
    if ($reservationID !== null) {
        // Prepare the SQL query with placeholders for updates
        $sql = "UPDATE reservation SET 
                CID = ?, 
                BranchID = ?,
                Destination = ?,
                NoOfAdults = ?,
                NoOfChildren = ?,
                PickupTime = ?,
                ReturnTime = ?,
                PickupDate = ?,
                ReturnDate = ?
                WHERE ReservationID = ?";

        // Prepare the statement
        if ($stmt = $con->prepare($sql)) {
            // Bind the parameters from the received data to the SQL query
            
            $stmt->bind_param("iisiissssi", 
                $data[1], // CID
                $data[2], // BranchID
                $data[3], // Destination
                $data[4], // NoOfAdults
                $data[5], // NoOfChildren
                $data[6], // PickupTime
                $data[7], // ReturnTime
                $data[8], // PickupDate
                $data[9], // ReturnDate
                
                $reservationID // ReservationID (as the condition)
            );

            // Execute the statement
            if ($stmt->execute()) {
                // Send success response
                echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
            } else {
                // Send error response
                echo json_encode(['status' => 'error', 'message' => 'Failed to update record']);
            }

            // Close the statement
            $stmt->close();
        } else {
            // If preparing the statement fails, send an error
            echo json_encode(['status' => 'error', 'message' => 'Failed to prepare the SQL statement']);
        }


    }

   /*//----------------------------------------------------------Update branchcontact data-----------------------------------------------------------------------------------------

    // Ensure that ReservationID is present
    if ($branID !== null  && $telB !== null) {
        // Prepare the SQL query with placeholders for updates
        $sql = "UPDATE branchcontact SET 
                Telno = ? 
                
                WHERE BranchID = ? AND Telno = ?";

        // Prepare the statement
        if ($stmt = $con->prepare($sql)) {
            // Bind the parameters from the received data to the SQL query
            
            $stmt->bind_param("sis", 
                $data[1], // Updated Telno
                
                $branID, // ReservationID (as the condition)
                $telB
            );

            // Execute the statement
            if ($stmt->execute()) {
                // Send success response
                echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
            } else {
                // Send error response
                echo json_encode(['status' => 'error', 'message' => 'Failed to update record']);
            }

            // Close the statement
            $stmt->close();
        } else {
            // If preparing the statement fails, send an error
            echo json_encode(['status' => 'error', 'message' => 'Failed to prepare the SQL statement']);
        }


    }*/
    
    
    
    /*else {
        // If no customer ID is present in the data, return an error
        echo json_encode(['status' => 'error', 'message' => 'No customer ID provided']);
    }*/
} else {
    // If no data was received, send an error
    echo json_encode(['status' => 'error', 'message' => 'No data received']);
}

// Close the database connection
$con->close();
?>
