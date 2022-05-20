<?php
    session_start(); 
    include("connection.php");
    include("check_login.php");
    include("logeventfunc.php");

    $comment_id = $_POST["comment_id"];
    $delete_query = "DELETE FROM comments WHERE comment_id = '$comment_id'";
    if (mysqli_query($con, $delete_query)) {
        logEvent('User '.$_SESSION["firstName"].' '.$_SESSION["lastName"].' deleted his/her comment.');
        header("Location:cars.php");
    } else {
        echo "Error deleting comment: " . mysqli_error($con);
        header("Refresh:2; url=cars.php");
    }

?>