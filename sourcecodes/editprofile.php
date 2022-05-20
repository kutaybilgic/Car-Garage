<!DOCTYPE html>
<?php session_start(); 
include("connection.php");
include("check_login.php");
include("logeventfunc.php");
?>

<html >
<head>
    <title>Edit Profile</title>
</head>
<body style="background-color:powderblue;">
    <?php 
        $query = "SELECT * FROM photos WHERE user_id = '$_SESSION[user_id]'";
        $result = mysqli_query($con,$query);

        if(mysqli_num_rows($result) > 0){
            $images = mysqli_fetch_assoc($result);

            echo "<img src = images/$images[photo] width=175 height=200 >  ";
        }
    
    
    
    ?>


    
    <h1><a href="updatephoto.php">Update Your Avatar</a></h1>
    <h1><a href="changepassword.php">Change Your Passowrd</a></h1>

    <h1>Email,name,surname and phone number can not be changed.</h1>

    <h1><a href="user_panel.php">Go Back</a></h1>





</body>
</html>