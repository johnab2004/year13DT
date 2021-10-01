<?php

// starts a session so that the user has a specific set session that allows them to input the password
session_start();

// connection code that connects the website to the database

$con = mysqli_connect("localhost", "johnab", "blacklime65", "johnab_market2");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

if((!isset($_SESSION['logged_in'])) or $_SESSION['logged_in'] !=1){
    header("Location: error.php");
}

// query that selects everything from the table fruits, so that it can be updated to the new info
$update_fruits = "SELECT * FROM fruit";
$update_fruits_record = mysqli_query($con, $update_fruits);

// query that selects everything from the table vege, so that it can be updated to the new info
$update_veges = "SELECT * FROM vege";
$update_veges_record = mysqli_query($con, $update_veges);

?>



<!DOCTYPE html>

<html lang="en">

<head>
    <!-- creates the page for the admin to update the vege and fruit information -->
    <title> Abia's Market</title>
    <meta charset=utf-8">
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>

<body>
<header>
    <h1>Abia's Fruit and Vege Market</h1>
    <nav>

        <!-- the connection link to the other pages from the update page-->

        <a href='index.php'>HOME</a>
        <a href='fruit.php'>FRUIT</a>
        <a href='vege.php'>VEGE</a>
        <a href='specials.php'>SPECIALS</a>
        <a href='admin.php'>ADMIN</a>
        <a href='signup.php'>SIGN-UP</a>
        <a href='process_logout.php'>ADMIN LOGOUT</a>

    </nav>

    <h2>Make a change to the products available</h2>

<h3>Add a fruit</h3>

<div class="add">

    <!-- This is the form that allows the user to add in a new fruit-->

    <form action='f_insert.php' method="post">

        <!-- There are different inputs for all information that is being added to the database-->

        Fruit ID :<input type="text" name="FruitID"><br>
        Fruit Name :<input type="text" name="FName"><br>
        Variety :<input type="text" name="Variety"><br>
        Cost :<input type="text" name="Cost"><br>
        Calories :<input type="text" name="Calories"><br>
        <input type="submit" value="Insert">

    </form>

</div>


<h3>Update Fruits</h3>

    <!-- This forms a table for the information to be updated, enabling the user to make changes to the current fruit-->

    <table>
    <tr>
        <!-- Labels for the infromation -->

        <th>Fruit Name</th>
        <th>Variety</th>
        <th>Cost</th>
        <th>Calories</th>
        <th>Submit</th>
        <th>Delete</th>

    </tr>

    <?php
    while($row = mysqli_fetch_array($update_fruits_record))
    {
        // these are inputs within the form that enable the user to make changes, and then the query is used to update this information
        echo "<tr><form action = fupdate.php method=post>";
        echo "<td><input type=text name= FName value='" .$row['FName']. "'></td>";
        echo "<td><input type=text name=Variety value='" .$row['Variety']. "'></td>";
        echo "<td><input type=text name=Cost value='" .$row['Cost']. "'></td>";
        echo "<td><input type=text name=Calories value='" .$row['Calories']. "'></td>";
        echo "<input type=hidden name=FruitID value='" .$row['FruitID']. "'>";
        echo "<td><input type=submit></td>";
        echo "<td><a href=f_delete.php?FruitID=" .$row['FruitID']. ">Delete</a></td>";
        echo "</form></tr>";

    }
    ?>
</table>

</header>

<hr>

<!-- This is for when a vegetable is added to the database-->

<h3>Add a Vege</h3>

<div class="add">

    <!-- This form acts with inputs for each asoect that is being added to the database -->


    <form action='v_insert.php' method="post">

        Vege ID :<input type="text" name="VegeID"><br>
        Vege Name :<input type="text" name="VName"><br>
        Variety :<input type="text" name="Variety"><br>
        Cost :<input type="text" name="Cost"><br>
        Calories :<input type="text" name="Calories"><br>

        <input type="submit" value="Insert">

    </form>

</div>

    <!-- This the update vege part of the page-->


<h3>Update Vege</h3>

<!-- Creates a table for all the information of the current fruit to be laid out-->

<table>
    <tr>
        <th>Vege Name</th>
        <th>Variety</th>
        <th>Cost</th>
        <th>Calories</th>
        <th>Submit</th>
        <th>Delete</th>
    </tr>


    <?php

    // these are inputs within the form that enable the user to make changes, and then the query is used to update this information

    while($row = mysqli_fetch_array($update_veges_record))
    {
        echo "<tr><form action = vupdate.php method=post>";
        echo "<td><input type=text name= VName value='" .$row['VName']. "'></td>";
        echo "<td><input type=text name=Variety value='" .$row['Variety']. "'></td>";
        echo "<td><input type=text name=Cost value='" .$row['Cost']. "'></td>";
        echo "<td><input type=text name=Calories value='" .$row['Calories']. "'></td>";
        echo "<input type=hidden name=VegeID value='" .$row['VegeID']. "'>";
        echo "<td><input type=submit></td>";
        echo "<td><a href=v_delete.php?VegeID=" .$row['VegeID']. ">Delete</a></td>";
        echo "</form></tr>";

    }
    ?>
</table>





</body>

</html>

