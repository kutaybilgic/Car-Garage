<?php 
    session_start(); 
    include("connection.php");
    include("check_login.php");
    include("logeventfunc.php");


    if($_POST){
        $idof_car = $_POST["id_car"];
        $idof_user = $_POST["id_user"];
        if($_SESSION["user_id"] != $idof_user){
            $add_fav_query = ("INSERT INTO favorites(user_id,car_id) 
            values('$_SESSION[user_id]', '$idof_car')");
            mysqli_query($con,$add_fav_query);
            logEvent('User '.$_SESSION["firstName"].' '.$_SESSION["lastName"].' added a car to his/her favourites.');
            header("Location:cars.php");
        }
        else{
            echo("You can not add to favorites of your own car!!");
            header("Refresh:2; url= cars.php");
        }
        
    }
?>