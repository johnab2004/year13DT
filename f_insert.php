<?php


$con = mysqli_connect("localhost", "johnab", "blacklime65", "johnab_market2");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}


$FruitID = $_POST['FruitID'];
$FName = $_POST['FName'];
$Variety = $_POST['Variety'];
$Cost = $_POST['Cost'];
$Calories = $_POST['Calories'];

$insert_fruit = "INSERT INTO fruit (FruitID, FName, Variety, Cost, Calories) VALUES ('$FruitID', '$FName', '$Variety', '$Cost', '$Calories')";

if(!mysqli_query($con, $insert_fruit))
{
    echo 'Not Inserted';
}

else {
    echo 'Inserted';
}


header("refresh:2; url=fruit.php");


