<?php
// Include database configuration file
require_once '../../PHP/config.php';

// Get the raw POST data and decode the JSON
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $branID = isset($data['branID']) ? $data['branID'] : null;
    echo "$branID";
    $telB = isset($data['telB']) ? $data['telB'] : null;
    echo "$telB";
    $cusID = isset($data['cusID']) ? $data['cusID'] : null;
    $telC = isset($data['telC']) ? $data['telC'] : null;

    $ctmID = isset($data['ctmID']) ? $data['ctmID'] : null;
    $emailC = isset($data['emailC']) ? $data['emailC'] : null;


    //----------------------------------------------------------Update branchcontact data-----------------------------------------------------------------------------------------

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


    }

    //----------------------------------------------------------Update cuscontact data-----------------------------------------------------------------------------------------

    

    if ($cusID !== null  && $telC !== null) {
        // Prepare the SQL query with placeholders for updates
        $sql = "UPDATE cuscontact SET 
                Tel = ? 
                
                WHERE CID = ? AND Tel = ?";

        // Prepare the statement
        if ($stmt = $con->prepare($sql)) {
            // Bind the parameters from the received data to the SQL query
            
            $stmt->bind_param("iii", 
                $data[1], // Updated Telno
                
                $cusID, // ReservationID (as the condition)
                $telC
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

    //----------------------------------------------------------Update cusemail data-----------------------------------------------------------------------------------------


    if ($ctmID !== null  && $emailC !== null) {
        // Prepare the SQL query with placeholders for updates
        $sql = "UPDATE cusemail SET 
                Email = ? 
                
                WHERE CID = ? AND Email = ?";

        // Prepare the statement
        if ($stmt = $con->prepare($sql)) {
            // Bind the parameters from the received data to the SQL query
            
            $stmt->bind_param("sis", 
                $data[1], // Updated Telno
                
                $ctmID, // ReservationID (as the condition)
                $emailC
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
    
 else {
    // If no data was received, send an error
    echo json_encode(['status' => 'error', 'message' => 'No data received']);
}

// Close the database connection
$con->close();


}