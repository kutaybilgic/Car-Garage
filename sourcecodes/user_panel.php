<!DOCTYPE html>

<?php
    session_start(); 
    include("connection.php");
    include("check_login.php");
    include("logeventfunc.php");
   
?>



<html >
<head>
    <title>User Panel</title>
</head>
<body style="background-color:powderblue;">
<style>
    #avatar {
        position: relative;
    }
    #avatar img {
        position: absolute;
        top: 0px;
        right: 0px;
    }

</style>
<?php $query = "SELECT * FROM photos WHERE user_id = '$_SESSION[user_id]'";
        $result = mysqli_query($con,$query);

        if(mysqli_num_rows($result) > 0){
            $images = mysqli_fetch_assoc($result);

            echo "<div id = avatar ><img src = images/$images[photo] width=175 height=200></div>  ";
        }?>
    <button><a href="logout.php">Log Out</a></button>
    <center><h1>You are logged in, welcome the user panel.</h1><br>
    <?php 
        if (isset($_SESSION["firstName"])){
            echo "<h1>Welcome ".$_SESSION["firstName"]." ". $_SESSION["lastName"]."</h1>"."</center>";
        }
        
    
    
    
    ?>
    


    <h1>OPTIONS</h1><br>
    <h1><a href="editprofile.php">Edit your profile</a></h1>
    <h1><a href="cars.php">Explore cars</a></h1>
    <h1><a href="sellcars.php">Sell your car</a></h1>
    <h1><a href="usercars.php">My Sales List</a></h1>
    <h1><a href="userfavorites.php">My Favorites List</a></h1>
    
</body>
</html>