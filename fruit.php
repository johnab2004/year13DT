<?php


$con = mysqli_connect("localhost", "johnab", "blacklime65", "johnab_market2");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

if(isset($_GET['fruit'])){
    $id = $_GET['fruit'];
} else {
    $id = 1;
}


$all_fruits_query ="Select FruitID, FName from fruit";
$all_fruits_result = mysqli_query($con, $all_fruits_query);

$this_fruit_query = "SELECT FName, Variety, Cost, Calories FROM fruit WHERE FruitID = '" .$id . "'";
$this_fruit_result = mysqli_query($con, $this_fruit_query);
$this_fruit_record = mysqli_fetch_assoc($this_fruit_result);

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

    <div class="container1">
        <a href="index.php"><img class="logo" src="logo.png" alt="WGC logo" width="180" height="180"></a>
    </div>

    <h2>Fruit!</h2>

    <h3> Fruit information!</h3>

    <?php
    echo"<p> Fruit Name: " .$this_fruit_record['FName'] . "<br>";
    echo "<p> Variety: " .$this_fruit_record['Variety'] . "<br>";
    echo "<p> Cost: $" .$this_fruit_record['Cost'] . "<br>";
    echo "<p> Calories per 100 grams: " .$this_fruit_record['Calories'] . "<br>";

    ?>

    <hr>


    <h3>Select another fruit information</h3>

    <main>
        <form name ='fruit_form' id='fruit_form' method='get' action='fruit.php'>
            <select id='fruit' name='fruit'>
                <?php
                while($all_fruits_record = mysqli_fetch_assoc($all_fruits_result)){
                    echo "<option value = '". $all_fruits_record['FruitID'] . " '>";
                    echo $all_fruits_record['FName'];
                    echo "</option>";
                }
                ?>
            </select>
            <input type ='submit' name='fruit_button' value='Show me this fruits information'>
        </form>
    </main>

</header>

<hr>

    <h3>Search a fruit</h3>

    <main>
        <form action="" method="post">
            <input type='text' name='search'>
            <input type='submit' name='submit' value="Search">
        </form>

        <?php

        if(isset($_POST['search'])) {
            $search = $_POST['search'];

            $query1 = "SELECT * FROM fruit WHERE FName LIKE '%$search%'";
            $query = mysqli_query($con, $query1);
            $count = mysqli_num_rows($query);

            if($count == 0){
                echo "There was no search results";

            }else {
                while($row = mysqli_fetch_array($query)) {
                    echo $row ['FName'];
                    echo "<br>";
                }
            }
        }
        ?>

    </main>

<hr>

<h3>All Fruit available</h3>

<div class="filter">


    <form action="fruit.php" method="post">
        <input type='submit' name='NA-Z' value="Fruit Name A-Z"> <br>
        <input type='submit' name='NZ-A' value="Fruit Name Z-A"> <br>
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
        <th>Fruit Name</th>
        <th>Price</th>
        <th>Calories</th>
        <th>Variety</th>

    </tr>

    <?php
    if (isset($_POST['NA-Z'])) {
        // sorts the fruit from the database in A-Z order (ASC)
        $result = mysqli_query($con, "SELECT * FROM fruit ORDER BY FName ASC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['FruitID'];
                echo "<tr>";
                echo "<td>" . $test['FName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Variety'] . "</td>";


                echo "</tr>";
            }
        }
    }


    if (isset($_POST['NZ-A'])) {
        // sorts the fruit from the database in Z-A order (DESC)
        $result = mysqli_query($con, "SELECT * FROM fruit ORDER BY FName DESC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['FruitID'];
                echo "<tr>";
                echo "<td>" . $test['FName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Variety'] . "</td>";

                echo "</tr>";
            }
        }
    }


    if (isset($_POST['low_to_high'])) {
        // sorts the fruit from the database from cost low-high (ASC)
        $result = mysqli_query($con, "SELECT * FROM fruit ORDER BY Cost ASC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['FruitID'];
                echo "<tr>";
                echo "<td>" . $test['FName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Variety'] . "</td>";

                echo "</tr>";
            }
        }
    }


    if (isset($_POST['high_to_low'])) {
        // sorts the fruit from the database from cost high-low (DESC)
        $result = mysqli_query($con, "SELECT * FROM fruit ORDER BY Cost DESC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['FruitID'];
                echo "<tr>";
                echo "<td>" . $test['FName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Variety'] . "</td>";
                echo "</tr>";
            }
        }
    }

    if (isset($_POST['cal_low_to_high'])) {
        // sorts the fruit from the database from calories low-high (ASC)
        $result = mysqli_query($con, "SELECT * FROM fruit ORDER BY Calories ASC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['FruitID'];
                echo "<tr>";
                echo "<td>" . $test['FName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Variety'] . "</td>";
                echo "</tr>";
            }
        }
    }

    if (isset($_POST['cal_high_to_low'])) {
        // selects the fruit from the database from the calories high-low (DESC)
        $result = mysqli_query($con, "SELECT * FROM fruit ORDER BY Calories DESC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['FruitID'];
                echo "<tr>";
                echo "<td>" . $test['FName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Variety'] . "</td>";
                echo "</tr>";
            }
        }
    }

    if (isset($_POST['VA-Z'])) {
        // sorts the fruit from the database from the stock low-high (ASC)
        $result = mysqli_query($con, "SELECT * FROM fruit ORDER BY Variety ASC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['FruitID'];
                echo "<tr>";
                echo "<td>" . $test['FName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Variety'] . "</td>";
                echo "</tr>";
            }
        }
    }

    if (isset($_POST['VZ-A'])) {
        // sorts the fruit from the database from the stock high-low (DESC)
        $result = mysqli_query($con, "SELECT * FROM fruit ORDER BY Variety DESC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['FruitID'];
                echo "<tr>";
                echo "<td>" . $test['FName'] . "</td>";
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

    <h3>Add a fruit</h3>

    <div class="add">

    <form action='insert.php' method="post">

        Fruit ID :<input type="text" name="FruitID"><br>
        Fruit Name :<input type="text" name="FName"><br>
        Variety :<input type="text" name="Variety"><br>
        Cost :<input type="text" name="Cost"><br>
        Calories :<input type="text" name="Calories"><br>
        <input type="submit" value="Insert">

    </form>

    </div>


</body>

</html>

