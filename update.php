<?php


$con = mysqli_connect("localhost", "johnab", "blacklime65", "johnab_market2");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

$update_fruit ="UPDATE fruit SET FName='$_POST[FName]', Variety='$_POST[Variety]', Cost ='$_POST[Cost]', Calories ='$_POST[Calories]' WHERE FruitID='$_POST[FruitID]'";

if(!mysqli_query($con, $update_fruit))
{
    echo 'Not Updated';
}

else
{
    echo 'Updated';
}

header("refresh:2; url=fruit.php");

