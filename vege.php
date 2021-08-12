<?php


$con = mysqli_connect("localhost", "johnab", "blacklime65", "johnab_market2");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

if(isset($_GET['vege'])){
    $id = $_GET['vege'];
} else {
    $id = 1;
}


$update_veges = "SELECT * FROM vege";
$update_veges_record = mysqli_query($con, $update_veges);

$all_veges_query ="Select VegeID, VName from vege";
$all_veges_result = mysqli_query($con, $all_veges_query);

$this_veges_query = "SELECT VName, Variety, Cost, Calories FROM vege WHERE VegeID = '" .$id . "'";
$this_veges_result = mysqli_query($con, $this_veges_query);
$this_veges_record = mysqli_fetch_assoc($this_veges_result)


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


        <a href='index.php'>HOME</a>
        <a href='fruit.php'>FRUIT</a>
        <a href='vege.php'>VEGE</a>
        <a href='specials.php'>SPECIALS</a>
        <a href='admin.php'>ADMIN</a>
        <a href='signup.php'>SIGN-UP</a>

    </nav>
</header>


<div class="container1">
        <a href="index.php"><img class="logo" src="logo.png" alt="WGC logo" width="180" height="180"></a>
    </div>

    <h2>Vegetables!</h2>

    <h3> Vegetable Information!</h3>

    <?php
    echo"<p> Vege Name: " .$this_veges_record['VName'] . "<br>";
    echo "<p> Variety: " .$this_veges_record['Variety'] . "<br>";
    echo "<p> Cost: $" .$this_veges_record['Cost'] . "<br>";
    echo "<p> Calories per 100 grams: " .$this_veges_record['Calories'] . "<br>";

    ?>

<hr>

    <h3> Select another vegetables information</h3>

<main>
    <form name ='vege_form' id='vege_form' method='get' action='vege.php'>
        <select id='vege' name='vege'>
            <?php
            while($all_veges_record = mysqli_fetch_assoc($all_veges_result)){
                echo "<option value = '". $all_veges_record['VegeID'] . " '>";
                echo $all_veges_record['VName'];
                echo "</option>";
            }
            ?>
        </select>
        <input type ='submit' name='vege_button' value='Show me this veges information'>
    </form>
</main>

<hr>

<h3>Search a vege</h3>

<main>
    <form action="" method="post">
        <input type='text' name='search'>
        <input type='submit' name='submit' value="Search">
    </form>

    <?php

    if(isset($_POST['search'])) {
        $search = $_POST['search'];

        $query1 = "SELECT * FROM vege WHERE VName LIKE '%$search%'";
        $query = mysqli_query($con, $query1);
        $count = mysqli_num_rows($query);

        if($count == 0){
            echo "There was no search results";

        }else {
            while($row = mysqli_fetch_array($query)) {
                echo $row ['VName'];
                echo "<br>";
            }
        }
    }
    ?>

</main>

<hr>


<h3>All Vege available</h3>

<div class="filter">


    <form action="vege.php" method="post">
        <input type='submit' name='NA-Z' value="Vege Name A-Z"> <br>
        <input type='submit' name='NZ-A' value="Vege Name Z-A"> <br>
        <input type='submit' name='low_to_high' value="Price Low - High"><br>
        <input type='submit' name='high_to_low' value="Price High - Low"><br>
        <input type='submit' name='cal_low_to_high' value="Calories Low - High"><br>
        <input type='submit' name='cal_high_to_low' value="Calories High - Low"><br>
        <input type='submit' name='VA-Z' value="Variety Name A-Z"><br>
        <input type='submit' name='VZ-A' value="Variety Name Z-A"><br>
    </form>

</div>

<table style="width:50%" class="table-stripped table-center">
    <tr>
        <th>Vege Name</th>
        <th>Price</th>
        <th>Calories</th>
        <th>Variety</th>

    </tr>


    <?php
    if (isset($_POST['NA-Z'])) {
        // sorts the vege from the database in A-Z order (ASC)
        $result = mysqli_query($con, "SELECT * FROM vege ORDER BY VName ASC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['VegeID'];
                echo "<tr>";
                echo "<td>" . $test['VName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Variety'] . "</td>";


                echo "</tr>";
            }
        }
    }


    if (isset($_POST['NZ-A'])) {
        // sorts the vege from the database in Z-A order (DESC)
        $result = mysqli_query($con, "SELECT * FROM vege ORDER BY VName DESC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['VegeID'];
                echo "<tr>";
                echo "<td>" . $test['VName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Variety'] . "</td>";

                echo "</tr>";
            }
        }
    }


    if (isset($_POST['low_to_high'])) {
        // sorts the vege from the database from cost low-high (ASC)
        $result = mysqli_query($con, "SELECT * FROM vege ORDER BY Cost ASC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['VegeID'];
                echo "<tr>";
                echo "<td>" . $test['VName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Variety'] . "</td>";

                echo "</tr>";
            }
        }
    }


    if (isset($_POST['high_to_low'])) {
        // sorts the vege from the database from cost high-low (DESC)
        $result = mysqli_query($con, "SELECT * FROM vege ORDER BY Cost DESC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['VegeID'];
                echo "<tr>";
                echo "<td>" . $test['VName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Variety'] . "</td>";
                echo "</tr>";
            }
        }
    }

    if (isset($_POST['cal_low_to_high'])) {
        // sorts the vege from the database from calories low-high (ASC)
        $result = mysqli_query($con, "SELECT * FROM vege ORDER BY Calories ASC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['VegeID'];
                echo "<tr>";
                echo "<td>" . $test['VName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Variety'] . "</td>";
                echo "</tr>";
            }
        }
    }

    if (isset($_POST['cal_high_to_low'])) {
        // selects the vege from the database from the calories high-low (DESC)
        $result = mysqli_query($con, "SELECT * FROM vege ORDER BY Calories DESC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['VegeID'];
                echo "<tr>";
                echo "<td>" . $test['VName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Variety'] . "</td>";
                echo "</tr>";
            }
        }
    }

    if (isset($_POST['VA-Z'])) {
        // sorts the vege from the database from the stock low-high (ASC)
        $result = mysqli_query($con, "SELECT * FROM vege ORDER BY Variety ASC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['VegeID'];
                echo "<tr>";
                echo "<td>" . $test['VName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Variety'] . "</td>";
                echo "</tr>";
            }
        }
    }

    if (isset($_POST['VZ-A'])) {
        // sorts the fruit from the database from the stock high-low (DESC)
        $result = mysqli_query($con, "SELECT * FROM vege ORDER BY Variety DESC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['VegeID'];
                echo "<tr>";
                echo "<td>" . $test['VName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Variety'] . "</td>";

                echo "</tr>";
            }
        }
    }


    ?>

</table>

<hr>

<h3>Add a Vege</h3>

    <div class="add">

        <form action='v_insert.php' method="post">

            Vege ID :<input type="text" name="VegeID"><br>
            Vege Name :<input type="text" name="VName"><br>
            Variety :<input type="text" name="Variety"><br>
            Cost :<input type="text" name="Cost"><br>
            Calories :<input type="text" name="Calories"><br>
            <input type="submit" value="Insert">

        </form>

    </div>


<h3>Update Vege</h3>

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