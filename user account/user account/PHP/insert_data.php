<?php

require 'config.php';
$CID=1;

$data = json_decode(file_get_contents('php://input'), true); //First argument captures the json format contentin the request body and decode it into a php associative array instead of an object

if (isset($data['emails']) && count($data['emails']) > 0) { 
    for($count=0; $count<count($data['emails']); $count++){
        $insertEmailsQuery="INSERT INTO cusemail(CID,Email) VALUES (?,?)" ;

        $prepare=$con->prepare($insertEmailsQuery);
        $prepare->bind_param("is",$CID,$data['emails'][$count]);
        $prepare->execute();
    }


}

if (isset($data['tels']) && count($data['tels']) > 0) { 
    for($count=0; $count<count($data['tels']); $count++){
        $insertTelsQuery="INSERT INTO cuscontact(CID,Tel) VALUES (?,?)" ;

        $prepareTel=$con->prepare($insertTelsQuery);
        $prepareTel->bind_param("is",$CID,$data['tels'][$count]);
        $prepareTel->execute();
    }


}

echo json_encode(["status" => "success"]);





?>