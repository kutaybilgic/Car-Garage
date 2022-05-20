<?php 

session_start();
include("logeventfunc.php");

if(isset($_SESSION["user_id"])){
    logEvent('User '.$_SESSION["firstName"].' '.$_SESSION["lastName"].' logged out from the system.');
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    unset($_SESSION["firstName"]);
    unset($_SESSION["lastName"]);
    unset($_SESSION["number"]);
}

header("Location: home.php");
die;