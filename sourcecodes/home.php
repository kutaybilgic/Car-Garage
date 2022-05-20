<!DOCTYPE html>
<?php 
    session_start();

    include("connection.php");
    include("logeventfunc.php");

?>


<html >
<head>
    <title>Home</title>
    <style>
body {
  background-image: url('cars.jpg');
  
}
</style>
</head>
<body>
    
    <form action="" method = "post">
    <center><font color = "red"><h1>Welcome to the Garage, You can find your dream car</h1>
    <h2>You need to log in or sign in</h2>
    
    <label for="email"><b>E-Mail:</b> </label>
    <input type="email" name = "email" id = "email" ><br><br>
    <label for="password"><b>Password:</b></label>
    <input type="password" name = "password" id ="password"><br><br>

    <button name="login">Log in</button><br><br>
    <b>Create an account </b>
    
    <button><a href="signup.php">Sign Up</a></button><br><br></font></form>





<?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST["email"];
    $password = sha1($_POST["password"]);

    if(!empty($email) && !empty($password)){
        
        $query = "SELECT * FROM registration where email = '$email' ";
        
        $result = mysqli_query($con,$query);

        if($result && mysqli_num_rows($result) > 0){
            
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data["password"] === $password){

                $_SESSION["user_id"] = $user_data["user_id"];
                $_SESSION["email"] = $user_data["email"];
                $_SESSION["password"] = $user_data["password"];
                $_SESSION["firstName"] = $user_data["firstName"];
                $_SESSION["lastName"] = $user_data["lastName"];
                $_SESSION["number"] = $user_data["number"];
                logEvent('User '.$_SESSION["firstName"].' '.$_SESSION["lastName"].' logged in to the system.');
                header("Location: user_panel.php");

            }

            else{
                echo "<font color = red><h1>Wrong email or password!</h1></font>";
            }


        }
        else{
            echo"<font color = red><h1>Your email hasn't been signed in yet.</h1></font>" ;
        }
        

    }
    else{
        echo "<font color = red><h1>Please enter the all information!</h1></font>";

    }
    
    
}
?></center>
   
</body>
</html>