<?php
session_start(); // Start the session

// Unset all session variables
$_SESSION = array();

// Finally, destroy the session.
session_destroy();

// Redirect to the login page or home page
header("Location: ../login_page/login.php"); 
exit();
?>
