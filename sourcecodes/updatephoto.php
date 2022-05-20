<!DOCTYPE html>
<?php session_start(); 
include('connection.php');
include("check_login.php");
include("logeventfunc.php");
?>

<html >
<head>
    <title>Update Photo</title>
</head>
<body style="background-color:powderblue;">
    <form action="" method="POST" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileupload" id="fileupload"><br>
    <input type="submit" value="Upload" name="submit">
    <button><a href="editprofile.php">Go Back</a></button>
    </form>
    

    <?php 
    
    if($_POST){
        $name = $_FILES["fileupload"]["name"];

        $temp_query = "SELECT photo from photos WHERE user_id = '$_SESSION[user_id]'";
        $result = mysqli_query($con,$temp_query);
        $num_recipes = mysqli_num_rows($result);
        if($num_recipes == 0){
            if(!empty($name)){
            
                $ex_of_img = pathinfo($name, PATHINFO_EXTENSION);
                $ex_of_img2 = strtolower($ex_of_img);
    
                $allowed = array("jpg","jpeg","png");
                if(in_array($ex_of_img2,$allowed)){
                    $filepath = "C:/xampp/htdocs/images/".$_FILES["fileupload"]["name"];
                    move_uploaded_file($_FILES["fileupload"]["tmp_name"], $filepath);
    
                
                    $query = "INSERT INTO photos(user_id,photo) values('$_SESSION[user_id]','$name')";
                    mysqli_query($con,$query);
                    echo "Your avatar changed successfully";
                    logEvent('User '.$_SESSION["firstName"].' '.$_SESSION["lastName"].' updated his/her avatar.');
                    header('Refresh:2; url = editprofile.php');
                }
                else{
                    echo "Allowed file type is png,jpeg and jpg";
                }
    
                
    
            }
    
            else{
                echo "Please select a photo from your computer";
            }
        }
    
        else{
            $ex_of_img = pathinfo($name, PATHINFO_EXTENSION);
            $ex_of_img2 = strtolower($ex_of_img);
    
            $allowed = array("jpg","jpeg","png");
            if(in_array($ex_of_img2,$allowed)){
                $filepath = "C:/xampp/htdocs/images/".$_FILES["fileupload"]["name"];
                move_uploaded_file($_FILES["fileupload"]["tmp_name"], $filepath);

                $query = "UPDATE photos SET photo = '$name' where user_id = '$_SESSION[user_id]'";
                if (mysqli_query($con, $query)) {
                    echo "Your avatar changed successfully";
                    logEvent('User '.$_SESSION["firstName"].' '.$_SESSION["lastName"].' updated his/her avatar.');
                    header("Refresh:2; url=editprofile.php");
                        
        }else {
            echo "Error updating record: " . mysqli_error($con);
          }
       
    }
    else{
        echo "Allowed file types are png,jpeg and jpg";
    }
}
    } 
    
    ?>
</body>
</html>