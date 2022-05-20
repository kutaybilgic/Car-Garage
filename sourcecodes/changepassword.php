<!DOCTYPE html>
<?php session_start(); 
include("connection.php");
include("check_login.php");
include("logeventfunc.php");
?>
<html>
<head>
    <title>Update Password</title>
</head>
<body style="background-color:powderblue;">
    
    <form action="" method = "POST">
    <label for="old_password">Enter Your Password:</label>
    <input type="password" name = "old_password" id = "old_password"><br><br>

    <label for="new_password">Enter Your new Password:</label>
    <input type="password" name = "new_password" id = "new_password"><br><br>

    <label for="new_password_again">Enter Your new Password Again:</label>
    <input type="password" name = "new_password_again" id = "new_password_again"><br><br>

    <input type="submit" value="Submit" name="submit">
    <button><a href="editprofile.php">Go Back</a></button>


    </form>
    
    
</body>

<?php 

if($_POST){
    $old_password = $_POST["old_password"];
    $new_password = $_POST["new_password"];
    $new_password_again = $_POST["new_password_again"];
    if(!empty($old_password) && !empty($new_password)){
        if ($_SESSION["password"] == $old_password){
            if($new_password == $new_password_again){
                $query = "UPDATE registration SET password = '$new_password' where user_id = '$_SESSION[user_id]'";
            if (mysqli_query($con, $query)) {
                echo "You password changed successfully, You are being redirected.";
                $_SESSION["password"] = $new_password;
                logEvent('User '.$_SESSION["firstName"].' '.$_SESSION["lastName"].' updated his/her password.');
                header("Refresh:2; url=editprofile.php");
                
              } else {
                echo "Error updating record: " . mysqli_error($conn);
              }
            }
            else{
                echo "The new passwords you entered do not match. ";
            }
            
              
        }

        else{
            echo "Your password is wrong please try it again";
        }

        }
    else{
        echo "Please give the all information";
    }
}






?>
</html>