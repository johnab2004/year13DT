<?php


$con = mysqli_connect("localhost", "johnab", "blacklime65", "johnab_market2");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else {
    echo "connected to database";

}

$delete_vege = "DELETE FROM vege WHERE VegeID='$_GET[VegeID]'";


if(!mysqli_query($con, $delete_vege))

{
    echo 'Not Deleted';
}

else {
    echo 'Deleted';
}

header("refresh:2; url = vege.php");


