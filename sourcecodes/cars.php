<!DOCTYPE html>
<?php
    session_start(); 
    include("connection.php");
    include("check_login.php");
    include("logeventfunc.php");
   
?>
<html >
<head>
    <title>Cars</title>
</head>
<body style="background-color:#F0F8FF;">
<button><a href="user_panel.php">Go Back</a></button>
<style>
table, th, td {
  border:1px solid black;
}
/* table {border-collapse: collapse;} */
</style>
<?php 

    $query = "SELECT * FROM cars ";
                
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0){
        while($car_data = mysqli_fetch_assoc($result)){
            $user_id = $car_data["user_id"];
            $car_id = $car_data["car_id"];
            $model = $car_data["model"];
            $carname = $car_data["carname"];
            $year = $car_data["year"];
            $color = $car_data["color"];
            $price = $car_data["price"];
            $distance = $car_data["distance"];
            $fueltype = $car_data["fueltype"];
            $engine = $car_data["engine"];
            $transmission = $car_data["transmission"];
            $carphoto = $car_data["carphoto"];
            
           

            

            
            echo  "<p><img src = images/$carphoto width=250 height=200 align = left </p>";
            
            echo "<table>
            <tr>
                <td><b>Car Id</b></td>
                <td><b>Car Model</b></td>
                <td><b>Full Name</b></td>
                <td><b>Year</b></td>
                <td><b>Color</b></td>
                <td><b>Price</b></td>
                <td><b>Distance</b></td>
                <td><b>Fuel Type</b></td>
                <td><b>Engine</b></td>
                <td><b>Transmission</b></td>
            </tr>

            <tr>
                <td>$car_id</td>
                <td>$model</td>
                <td>$carname</td>
                <td>$year</td>
                <td>$color</td>
                <td>$price $</td>
                <td>$distance km</td>
                <td>$fueltype</td>
                <td>$engine</td>
                <td>$transmission</td>

            </tr>
            
            </table>"."<br>";
                
            //echo "<b>&nbsp Car Id:</b> ".$car_id."<br>"; 
            //echo "<b>&nbsp Car Model:</b> ".$model."<br>";  
            //echo "<b>&nbsp Full Name:</b> ".$carname."<br>";
            //echo "<b>&nbsp Year:</b> ".$year."<br>";
            //echo "<b>&nbsp Color:</b> ".$color."<br>";
            //echo "<b>&nbsp Price:</b> ".$price." $"."<br>";
            //echo "<b>&nbsp Distance:</b> ".$distance." km"."<br>";
            //echo "<b>&nbsp Fuel Type:</b> ".$fueltype."<br>";
            //echo "<b>&nbsp Engine:</b> ".$engine."<br>";
            //echo "<b>&nbsp Transmission:</b> ".$transmission."<br><br>";
            
            

            $user_querry = "SELECT * FROM registration WHERE user_id = '$user_id'";
            $u_result = mysqli_query($con,$user_querry);
            $users_data = mysqli_fetch_assoc($u_result);
            $firstName = $users_data["firstName"];
            $lastName = $users_data["lastName"];
            $number = $users_data["number"];

            

            echo "<p>&nbsp<b>Owner of car's information</b></p>"."<br>";
            echo "<b>&nbsp First Name:</b> ".$firstName."<br>";
            echo "<b>&nbsp Last Name:</b> ".$lastName."<br>";
            echo "<b>&nbsp Phone Number:</b> ".$number."<br><br>";
            $fav_query = ("SELECT * FROM favorites where user_id = '$_SESSION[user_id]' and car_id = '$car_id'");
            $fav_result = mysqli_query($con,$fav_query);
            if(mysqli_num_rows($fav_result) > 0 ){
                while($fav_row = mysqli_fetch_assoc($fav_result)){
                    $fav_id = $fav_row["favorite_id"];
                    $fav_userid = $fav_row["user_id"];
                    $fav_carid = $fav_row["car_id"];
                    if(($_SESSION["user_id"] == $fav_userid) && ($car_id == $fav_carid)){
                        echo "<form action=deletefavorites.php method= POST>
                            <input type=hidden name=id_car value=$car_id/>
                            <input type=hidden name=id_user value=$user_id/>
                            <button>Remove from Favorites</button>
                            </form>";
                    }
                    else if ($user_id != $_SESSION["user_id"]){
                        echo "<form action=addfavorites.php method= POST>
                            <input type=hidden name=id_car value=$car_id/>
                            <input type=hidden name=id_user value=$user_id/>
                            <button>Add to Favorites</button>
                            </form>";
                }
                }
                
                
            }

            else{
                if($user_id != $_SESSION["user_id"]){
                    echo "<form action=addfavorites.php method= POST>
                    <input type=hidden name=id_car value=$car_id/>
                    <input type=hidden name=id_user value=$user_id/>
                    <button>Add to Favorites</button>
                    </form>";
                }
                
            }
            
            
            
            echo "<h1>COMMENTS</h1>";

            $see_comments = "SELECT * FROM comments WHERE car_id = '$car_id'";
            $see_comments = mysqli_query($con,$see_comments);
            while($row = mysqli_fetch_assoc($see_comments)){
                $comment_id = $row["comment_id"];
                $comment_name = $row["firstName"];
                $comment = $row["comment"];
                $u_id = $row["user_id"];
                $avatar = "SELECT photo from photos WHERE user_id = '$u_id'";
                $avatar_result = mysqli_query($con,$avatar);
                if(mysqli_num_rows($avatar_result) > 0){
                    $avatar2 = mysqli_fetch_assoc($avatar_result);
                    
                    echo "<p><img src = images/$avatar2[photo] width=75 height=90 align = left> </p>";
                }
                
                echo "<p><b>&nbsp Name:</b> ".$comment_name."</p><br>";
                echo "<b>&nbsp Comment:</b> ".$comment."<br><br>";
                if($u_id == $_SESSION["user_id"]){
                    echo "<form action=commentdelete.php method = POST>
                        <input type=hidden name=comment_id value=$comment_id/>
                          <button>Delete</button>  
                    </form>";
                }
            }
            echo "<br>";
            echo "<form action=comment.php method = POST>
                    <input type=hidden name=car_id value=$car_id />
                    <input type=hidden name=car_owner_name value=$firstName />
                    <textarea name=comment id=comment cols=50 rows=2></textarea>
                    <input type=submit value = Comment>
                    </form>";
            
            echo "<hr>";


        } 
        

    }

    else{
        echo "<h1>You have not any car on sale.</h1>"."<br>";
    }


?>




</body>
</html>