<?php

require 'config.php';

if(isset($_GET["save_button"])){

    $cusID=1;

    if (isset($_GET["name"])) {
        echo "Hii";
        $name = $_GET["name"];
        $nameparts=preg_split("/\s+/",trim($name));
        $firstname=$nameparts[0];
        $lastname=$nameparts[1];
    } 

    if (isset($_GET["pw"])) {
        $pw = $_GET["pw"];
    } 

    //------------------------------------------------------------------------------------To capture the bio-----------------------------------------------------------------
    if (isset($_GET["BioI"])) {
        $Bio = $_GET["BioI"];
    } 
    

    //------------------------------------------------------------------------------------To capture the BOD(date)-----------------------------------------------------------------
    if (isset($_GET["DOBI"])) {
        $DOB = $_GET["DOBI"];
    } 

    
    //------------------------------------------------------------------------------------To capture the address-----------------------------------------------------------------
  
    if (isset($_GET["address"])) {
        $address = $_GET["address"];
        
    } 
    //------------------------------------------------------------------------------------To capture the gender-----------------------------------------------------------------
  
    if (isset($_GET["gender"])) {
        $gender = $_GET["gender"];
    } 
    

    $sql1 = "UPDATE customer SET FirstName = ?, LastName = ?, Bio = ?, DOB = ?, Password = ?, Address = ?, Gender = ? WHERE CusID = ?";
    $updates1=$con->prepare($sql1);
    
    $updates1->bind_param("sssssssi", $firstname, $lastname, $Bio, $DOB, $pw, $address, $gender, $cusID);

    if($updates1->execute()){
        echo "Record updated successfully!";
    } 
 else {
    echo "Error updating record.";
    }

     // Updating Email Addresses
/*if (isset($_POST['emails']) && count($_POST['emails']) > 0) {
    foreach ($_POST['emails'] as $email) {
        // Check if the email exists for the given CID
        $checkEmailQuery = "SELECT * FROM cusemail WHERE CID = ? AND Email = ?";
        $checkEmailStmt = $con->prepare($checkEmailQuery);
        $checkEmailStmt->bind_param("is", $cusID, $email);
        $checkEmailStmt->execute();
        $result = $checkEmailStmt->get_result();

        if ($result->num_rows > 0) {
            // Email exists, so update
            $updateEmailQuery = "UPDATE cusemail SET Email = ? WHERE CID = ? AND Email = ?";
            $updateEmailStmt = $con->prepare($updateEmailQuery);
            $updateEmailStmt->bind_param("sis", $email, $cusID, $email); 
            $updateEmailStmt->execute();
        } else {
            // If it doesn't exist, consider inserting a new record if needed
            $insertEmailQuery = "INSERT INTO cusemail (CID, Email) VALUES (?, ?)";
            $insertEmailStmt = $con->prepare($insertEmailQuery);
            $insertEmailStmt->bind_param("is", $cusID, $email);
            $insertEmailStmt->execute();
        }
    }
}*/


if (isset($_GET['email']) && is_array($_GET['email'])) {
    $email = $_GET['email'];

    foreach ($email as $key => $value) {
        // Ensure $value is an array and has 'new' and 'old' keys
        if (is_array($value) && isset($value['new']) && isset($value['old'])) {
            $newEmail = $value['new'];
            $oldEmail = $value['old'];

            echo $newEmail . "<br>";
            echo $oldEmail . "<br>";

            // Check if the telephone number was changed
            if ($newEmail !== $oldEmail) {
                // Update the telephone number in the database
                $updateEmailQuery = "UPDATE cusemail SET Email = ? WHERE CID = ? AND Email = ?";
                $updateEmailStmt = $con->prepare($updateEmailQuery);
                $updateEmailStmt->bind_param("sis", $newEmail, $cusID, $oldEmail);
                $updateEmailStmt->execute();
            }
        } else {
            echo "Invalid structure for email.";
        }
    }
} else {
    echo "Email not received properly.";
}




if (isset($_GET['tel']) && is_array($_GET['tel'])) {
    $tel = $_GET['tel'];

    foreach ($tel as $key => $value) {
        // Ensure $value is an array and has 'new' and 'old' keys
        if (is_array($value) && isset($value['new']) && isset($value['old'])) {
            $newTel = $value['new'];
            $oldTel = $value['old'];

            echo $newTel . "<br>";
            echo $oldTel . "<br>";

            // Check if the telephone number was changed
            if ($newTel !== $oldTel) {
                // Update the telephone number in the database
                $updateTelQuery = "UPDATE cuscontact SET Tel = ? WHERE CID = ? AND Tel = ?";
                $updateTelStmt = $con->prepare($updateTelQuery);
                $updateTelStmt->bind_param("sis", $newTel, $cusID, $oldTel);
                $updateTelStmt->execute();
            }
        } else {
            echo "Invalid structure for telephone number.";
        }
    }
} else {
    echo "Telephone data not received properly.";
}

   /* if (isset($_POST['tel']) && is_array($_POST['tel'])) {
       
        $tel=$_POST['tel'];
       foreach($tel as $key => $value){
        foreach($value as $key2 => $value2){
            if($key && $key2=="new"){
                $newTel=$value2;
                echo $newTel."<br>";
            }

            if($key && $key2=="old"){
                $oldTel=$value2;
            }
           
            
            // Check if the telephone number was changed
        if ($newTel !== $oldTel) {
            // Update the telephone number in the database
            $updateTelQuery = "UPDATE cuscontact SET Tel = ? WHERE CID = ? AND Tel = ?";
            $updateTelStmt = $con->prepare($updateTelQuery);
            $updateTelStmt->bind_param("sis", $newTel, $cusID, $oldTel);
            $updateTelStmt->execute();
        }

        else {
            echo "Invalid structure for telephone number.";
        }

       
    } 
}
    }

else {
    echo "Telephone data not received properly.";
    }*/
        
   
/*if (isset($_POST['tel']) && is_array($_POST['tel'])) {
    //$count=count($_POST['tel']);
    foreach ($_POST['tel'] as $tel) {
        //$no=$count-1;
        // Check if 'new' and 'old' values exist
        if (is_array($tel) && isset($tel['new']) && isset($tel['old'])) {//$tel[$count-$no]
            $newTel = $tel['new'];
            echo $newTel."<br>";
            $oldTel = $tel['old'];
            echo $oldTel."<br>";

            // Check if the telephone number was changed
            if ($newTel !== $oldTel) {
                // Update the telephone number in the database
                $updateTelQuery = "UPDATE cuscontact SET Tel = ? WHERE CID = ? AND Tel = ?";
                $updateTelStmt = $con->prepare($updateTelQuery);
                $updateTelStmt->bind_param("sis", $newTel, $cusID, $oldTel);
                $updateTelStmt->execute();
            }

          
        } 
        
        else {
            echo "Invalid structure for telephone number.";
        }
    }
}

else {
    echo "Telephone data not received properly.";
}*/


echo "<pre>";
print_r($_GET['tel']);
echo "</pre>";

    //echo "Records updated successfully!";

}   
?>