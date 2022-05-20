<?php
    session_start(); 
    include("connection.php");
    include("check_login.php");
    include("logeventfunc.php");
?>

<?php 
    $user_id = $_SESSION["user_id"];
    $car_id = $_POST["car_id"];
    $name = $_SESSION["firstName"];
    $comment = $_POST["comment"];
    $car_owner_name = $_POST["car_owner_name"];
    $comment_lenght = strlen($comment);

    if($comment_lenght > 400){
        echo "<h1>Comment lenght can not be bigger than 400 character.</h1>";
        header("Refresh:2; url= cars.php");
        
    }
    
    else if(empty($comment)){
        echo "<h1>Please fill the comment box.</h1>";
        header("Refresh:2; url= cars.php");
    } 
    else{
        $com_query = "INSERT INTO comments (user_id,car_id,firstName,comment)
        values('$user_id','$car_id','$name','$comment')";
        mysqli_query($con,$com_query);
        logEvent('User '.$_SESSION["firstName"].' '.$_SESSION["lastName"].' added a comment.');
        header("Location:cars.php");
    }




?>