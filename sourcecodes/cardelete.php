<?php
    session_start(); 
    include("connection.php");
    include("check_login.php");
    include("logeventfunc.php");

    $car_id3 = $_POST["car_id2"];
    $deletecar_query = "DELETE FROM cars WHERE car_id = '$car_id3'";
    if (mysqli_query($con, $deletecar_query)) {
        logEvent('User '.$_SESSION["firstName"].' '.$_SESSION["lastName"].' removed a car from sale. ');
        header("Location:usercars.php");
    } else {
        echo "Error deleting car: " . mysqli_error($con);
        header("Refresh:2; url=usercars.php");
    }

?>