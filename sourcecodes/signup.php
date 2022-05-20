<!DOCTYPE html>
<?php 
    session_start();

    include("connection.php");
    include("logeventfunc.php");
    
    
?>
<html>
<head >
    <title>Sign Up</title>
    <style>
body {
  background-image: url('faf.png');
  
}
</style>
</head>
<body style="background-color:powderblue;">
    <center><form action="" method = "POST">
        <b></b>
        <font color = "#FFFFF0"><h1>Please enter your information</h1>

    <label for="name"><b>Name:</b></label>
    <input type="text" name = "name" id = "name" ><br><br>

    <label for="surname"><b>Surname:</b></label>
    <input type="text" name = "surname" id = "surname" ><br><br>
    
    <label for="email"><b>E-mail:</b></label>
    <input type="email" name = "email" id = "email" ><br><br>

    <label for="password"><b>Password:</b></label>
    <input type="password" name = "password" id = "password" ><br><br>
    
    <label for="number"><b>Phone Number:</b></label>
    <input type="text" name = "number" id = "number"><br><br>


    <button name = "register">Submit</button>
    <button><a href="home.php">Go Home Page</a></button></font>

    

    </center>

    </form>
    

</body>
<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $password = sha1($_POST["password"]);
    $number = $_POST["number"];

    if(!empty($name) && !empty($surname) && !empty($email)
    && !empty($password) && !empty($number)){

        $check_query = "SELECT * from registration where email = '$email'";
        $check_result = mysqli_query($con,$check_query);

        if(mysqli_num_rows($check_result) > 0){
            echo "<center><h1><font color = #FFFFF0 >This e-mail has already been taken.</font></h1></center> ";
        }
        else{
            $query = "INSERT INTO registration (firstName,lastName,email,password,number)
            values ('$name','$surname','$email','$password','$number')";

            mysqli_query($con,$query);

            header("Location: home.php");
        }
        
         


    }
    else{
        echo "<center><h1><font color = #FFFFF0>Please enter the all information!</font></h1></center>";

    }
}


?>

</html>