<?php

    // create credentials
    $hostname = 'localhost';
    $username = 'rentalsystem';
    $password = 'iwt2024';
    $database = 'vehiclerentalsystem';

    // create connection
    $conn =  new mysqli($hostname, $username, $password, $database);

    // check the connection
    if ( $conn -> connect_error) {
        echo $connect_error;
    }

?>