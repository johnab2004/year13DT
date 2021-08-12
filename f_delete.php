<?php


$con = mysqli_connect("localhost", "johnab", "blacklime65", "johnab_market2");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}


$delete_fruit = "DELETE FROM fruit WHERE FruitID='$_GET[FruitID]'";

if(!mysqli_query($con, $delete_fruit))

{
    echo 'Not Deleted';
}

else {
    echo 'Deleted';
}

header("refresh:2; url = fruit.php");


