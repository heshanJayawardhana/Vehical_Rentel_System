<?php

require 'config.php';
$CID=1;

$data = json_decode(file_get_contents('php://input'), true); //First argument captures the json format contentin the request body and decode it into a php associative array instead of an object

if (isset($data['updates']) && count($data['updates']) > 0) { 
    for($count=0; $count<count($data['updates']); $count++){
        $insertEmailsQuery="UPDATE TABLE customer SET  ;

        $prepare=$con->prepare($insertEmailsQuery);
        $prepare->bind_param("is",$CID,$data['emails'][$count]);
        $prepare->execute();
    }


}