<?php


$con = mysqli_connect("localhost", "johnab", "blacklime65", "johnab_market2");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

$update_vege ="UPDATE vege SET VName='$_POST[VName]', Variety='$_POST[Variety]', Cost ='$_POST[Cost]', Calories ='$_POST[Calories]' WHERE VegeID='$_POST[VegeID]'";

if(!mysqli_query($con, $update_vege))
{
    echo 'Not Updated';
}

else
{
    echo 'Updated';
}

header("refresh:2; url=vege.php");

