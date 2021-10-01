<?php

// connection code that connects the website to the database

$con = mysqli_connect("localhost", "johnab", "blacklime65", "johnab_market2");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

// this destroys the session that has been started when the user was logged out

session_start();
session_destroy();

// redirects the user to the home page, displaying the successful logged out message
header("Location: index.php");

echo "Successfully logged out";

?>
