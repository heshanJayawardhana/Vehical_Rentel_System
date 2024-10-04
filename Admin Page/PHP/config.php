<?php
    $server="localhost";
    $UN="root";
    $PW="";
    $DB="EasyRideReal";

    $con=new mysqli($server,$UN,$PW,$DB);

    if($con->connect_error){
        die("Connection failed.".$con->connect_error);
    }
?>