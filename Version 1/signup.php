<?php


$con = mysqli_connect("localhost", "johnab", "blacklime65", "johnab_market2");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title> Abia's Market</title>
    <meta charset=utf-8">
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>

<body>
<header>
    <h1>Abia's Fruit and Vege Market</h1>
    <nav>

        <a href='signup.php'>SIGN-UP</a>
        <a href='admin.php'>ADMIN</a>
        <a href='specials.php'>SPECIALS</a>
        <a href='vege.php'>VEGE</a>
        <a href='fruit.php'>FRUIT</a>
        <a href='index.php'>HOME</a>

    </nav>

    <h2> Sign-Up for more info</h2>

</header>
</body>


</html>

