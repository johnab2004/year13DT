<?php

// creates a session in which the user has a set amount of time until it logs them out from logging in
session_start();

// connects the website to database

$con = mysqli_connect("localhost", "johnab", "blacklime65", "johnab_market2");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

// gets the username and password from the database and sets these as variables in which it is checked if the user has submitted the right info
$user = trim($_POST['Username']);
$pass = trim($_POST['password']);

// checks if the password is the same to the ones in the admin table within the database
$login_query = "SELECT Password FROM admin WHERE Username = '" . $user."'";
$login_result = mysqli_query($con, $login_query);
$login_record = mysqli_fetch_assoc($login_result);

$hash = $login_record['Password'];

$verify = password_verify($pass, $hash);
if($verify) {
    // if it is correct logged_in will = 1, and the user will be taken to the home page
    $_SESSION['logged_in'] = 1;
    header("Location: index.php");
    echo "Logged In!";
}

// if not the use will remain in admin page and this error message will be displayed
else {
    header("Location: admin.php");
    echo "Unsuccessful login, try again";
}

?>


