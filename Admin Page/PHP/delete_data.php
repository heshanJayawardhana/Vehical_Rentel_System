<?php

require 'config.php';

$data = json_decode(file_get_contents('php://input'), true); //First argument captures the json format contentin the request body and decode it into a php associative array instead of an object

//----------------------------------------------------------------Email deletion-----------------------------------------------------------------------------------------

if (isset($data['emails']) && count($data['emails']) > 0) {  //check if values are available to remove
    $emailPlaceholders = implode(',', array_fill(0, count($data['emails']), '?'));  //array which starts from the index o and according to the number of emails available , be filled with ? whereas the implode function will get the array elements and joins them together as a string seperated by ,
    $deleteEmailsQuery = "DELETE FROM cusemail WHERE Email IN ($emailPlaceholders)";  //the string of / sperated by , will be merged to the sql statement
    $stmt = $con->prepare($deleteEmailsQuery);  //prepare to execute
    $stmt->bind_param(str_repeat('s', count($data['emails'])), ...$data['emails']);  //str_repeat repeats s until the no of emails, where ... will unpack the array data in $data['emails'] into seperate arguments which will finally be binded to ?
    $stmt->execute();

}

//----------------------------------------------------------------Tel deletion-----------------------------------------------------------------------------------------


if (isset($data['tels']) && count($data['tels']) > 0) {
    $telPlaceholders = implode(',', array_fill(0, count($data['tels']), '?')); 
    $deleteTelsQuery = "DELETE FROM cuscontact WHERE Tel IN ($telPlaceholders)";
    $stmt = $con->prepare($deleteTelsQuery);
    $stmt->bind_param(str_repeat('i', count($data['tels'])), ...$data['tels']);
    $stmt->execute();

}

echo json_encode(["status" => "success"]);





?>