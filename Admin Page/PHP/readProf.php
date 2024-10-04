<?php
    require 'config.php';

    $CusId=1;

    $sql="SELECT FirstName, LastName, Username, Password, NIC, Gender, DOB, TIMESTAMPDIFF(YEAR,DOB,CURDATE()) AS Age, Address, Bio, Profile from Customer where CusID=?";
 
    

    $prepare=$con->prepare($sql);
    
    $prepare->bind_param("i",$CusId);
    
    $prepare->execute();
   
    $result=$prepare->get_result();


    function cleanValues($input) {
        $cleaned = array();
        foreach ($input as $key => $value) {
            // Sanitize and clean the input values
            $cleaned[$key] = htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
        }
        return $cleaned;
    }
    if($result->num_rows > 0){
        $row=$result->fetch_assoc();
        $cleaned_values = cleanValues($row);
        $fname=$cleaned_values['FirstName'];
        $lname=$cleaned_values['LastName'];
        $gender=$cleaned_values['Gender'];
        $UN=$cleaned_values['Username'];
        $PW=$cleaned_values['Password'];
        $NIC=$cleaned_values['NIC'];
        $gender=$cleaned_values['Gender'];
        $DOB=$cleaned_values['DOB'];
        $address=$cleaned_values['Address'];
        $bio=$cleaned_values['Bio'];
        $profile=$cleaned_values['Profile'];
        $age=$cleaned_values['Age'];

        if($age==0){
            $age="Not specified";
        }

        if($DOB == date("Y-m-d")){
            $DOB="Not specified";
        }
        
        
    }

    $CID=1;

    $sql="SELECT Email FROM CusEmail where CID=?";
    $prepare=$con->prepare($sql);
    $prepare->bind_param("i",$CID);
    $prepare->execute();
    $result=$prepare->get_result();

    $emailArray=array();

    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            $emailArray[]=$row["Email"];
            }
        }

        
        
   

    $CID=1;

    $sql="SELECT Tel FROM CusContact where CID=?";
    $prepare=$con->prepare($sql);
    $prepare->bind_param("i",$CID);
    $prepare->execute();
    $result=$prepare->get_result();

    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            $telArray[]=$row["Tel"];
            }
        }
        


       
        
    


?>