<?php

// connection code - connects the website to the database

include 'connection.php';


?>

<!DOCTYPE html>

<!-- this is the page that the user is sent to if they try to make a change without being logged in as the admin -->

<html lang="en">


<h1> Login successful, welcome admin <3 </h1>

<?php

// this page is displayed, and the user will thne be redirected to the home page
header("refresh:2; url=index.php");
?>

</html>