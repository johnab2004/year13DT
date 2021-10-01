<?php

// connection code that connects the website to the database

include 'connection.php';


// makes a variable for the information of the user that is being signed up

$Email = $_POST['Email'];
$CFName = $_POST['CFName'];
$CLName = $_POST['CLName'];

// query that adds this information into the signup table

$add_user = "INSERT INTO signup(Email, CFName, CLName) VALUES ('$Email', '$CFName', '$CLName')";

// if the user hasn't been added to the database an error message will pop up, staying on the same page
if (!mysqli_query($con, $add_user))
{
    echo 'Customer not added';
}

// if the user has been added it will say it has successfully been added and then redirect the user to the home page
else

{
    echo 'Customer added to database';
}

header("refresh:2; url = index.php");



?>

