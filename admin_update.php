<?php

session_start();

// connects the website to the database

include 'connection.php';

// query that selects everything from the table fruits, so that it can be updated to the new info
$update_fruits = "SELECT * FROM fruit";
$update_fruits_record = mysqli_query($con, $update_fruits);

// query that selects everything from the table vege, so that it can be updated to the new info
$update_veges = "SELECT * FROM vege";
$update_veges_record = mysqli_query($con, $update_veges);

if((!isset($_SESSION['logged_in'])) or $_SESSION['logged_in'] !=1){
    header("Location: error.php");
}

?>



<!DOCTYPE html>

<html lang="en">

<head>
    <!-- creates the page for the admin to update the vege and fruit information -->
    <title> Abia's Market</title>
    <meta charset=utf-8>
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>

<body>
<header>
    <h1>Abia's Fruit and Vege Market</h1>
    <nav>

        <!-- the connection link to the other pages from the update page-->

        <a href='index.php'>HOME</a>
        <a href='admin.php'>ADMIN</a>
        <a href='fruit.php'>FRUIT</a>
        <a href='vege.php'>VEGE</a>
        <a href='specials.php'>SPECIALS</a>
        <a href='signup.php'>SIGN-UP</a>

    </nav>

    <h2>Make a change to the products available</h2>

<h3>Add a fruit</h3>

<div class="add">

    <!-- This is the form that allows the user to add in a new fruit-->

    <form action='f_insert.php' method="post">

        <!-- There are different inputs for all information that is being added to the database-->

        <!-- The following max and min lengths refer to the inputs, if any of these aren't met an error message will be revealed -->

        <label>Fruit ID :<input type="text" name="FruitID" maxlength="3" minlength="3" required><br></label>
       <label> Fruit Name :<input type="text" name="FName" maxlength="40" minlength="1" required><br></label>
        <label> Variety :<input type="text" name="Variety" maxlength="40" minlength="1" required><br></label>
        <label>Cost :<input type="text" name="Cost" maxlength="6" minlength="2" required><br></label>
        <label>Calories :<input type="text" name="Calories" maxlength="5" minlength="1" required><br></label>
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

    <!-- The following max and min lengths refer to the inputs, if any of these aren't met an error message will be revealed -->

    <form action='v_insert.php' method="post">

        <label> Vege ID :<input type="text" name="VegeID" maxlength="3" minlength="3" required><br></label>
        <label>Vege Name :<input type="text" name="VName" maxlength="40" minlength="1" required><br></label>
        <label>Variety :<input type="text" name="Variety" maxlength="40" minlength="1" required><br></label>
        <label>Cost :<input type="text" name="Cost" maxlength="6" minlength="2" required><br></label>
        <label>Calories :<input type="text" name="Calories" maxlength="5" minlength="1" required><br></label>

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

