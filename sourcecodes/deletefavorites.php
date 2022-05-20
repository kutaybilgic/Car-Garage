<?php 
    session_start(); 
    include("connection.php");
    include("check_login.php");
    include("logeventfunc.php");

    if($_POST){
        $car_id_del = $_POST["id_car"];
        $delete_fav = "DELETE FROM favorites where user_id = '$_SESSION[user_id]' and car_id = '$car_id_del'";
        $del_fav_query = mysqli_query($con,$delete_fav);
        logEvent('User '.$_SESSION["firstName"].' '.$_SESSION["lastName"].' remove a car to his/her favourites.');
        header("Location:cars.php");



    }




?>