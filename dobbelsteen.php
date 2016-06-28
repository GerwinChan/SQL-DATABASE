<?php

require_once("db_const.php");

function showItAll()

{

    $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    # check connection

    if ($mysqli->connect_errno) {

        echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";

        exit();

    }







    //haal de gegevens op

    $sql = "SELECT User_ID , Worp , Score, Time FROM poker Order BY Time DESC";
    echo $sql;
    $result = $mysqli->query($sql);



    if ($result->num_rows > 0) {

        // output data of each row

        while ($row = $result->fetch_assoc()) {

            echo "User_ID: " . $row["User_ID"] . " Worp: " . $row["Worp"] . " Score " . $row["Score"] . " Tijd " . $row['Time'] . "<br>";

        }

    } else {

        echo "Niets gevonden";

    }



    $mysqli->close(); // save resources

}

//test
showItAll();

?>
