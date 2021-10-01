<?php


$con = mysqli_connect("localhost", "johnab", "blacklime65", "johnab_market2");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}


$VegeID = $_POST['VegeID'];
$VName = $_POST['VName'];
$Variety = $_POST['Variety'];
$Cost = $_POST['Cost'];
$Calories = $_POST['Calories'];

$insert_vege = "INSERT INTO vege (VegeID, VName, Variety, Cost, Calories) VALUES ('$VegeID', '$VName', '$Variety', '$Cost', '$Calories')";

if(!mysqli_query($con, $insert_vege))
{
    echo 'Not Inserted';
}

else {
    echo 'Inserted';
}


header("refresh:2; url=vege.php");


