<!DOCTYPE html>

<?php
    session_start(); 
    include("connection.php");
    include("check_login.php");
    include("logeventfunc.php");
?>
<html >
<head>
    <title>My Favorites</title>
</head>
<body style="background-color:#F0F8FF;">
<style>
table, td, th {
  border: 1px solid black;
}

table {
  border-collapse: collapse;
}

</style>
    <button><a href="user_panel.php">Go Back</a></button><br><br>
    <form action="" method = "POST">
    <h1>Your Favorite List</h1>
    


    </form>
    
<?php 
    $query = "SELECT car_id FROM favorites where user_id = '$_SESSION[user_id]' ";
            
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0){

        while($car_data = mysqli_fetch_assoc($result)){

            $car_id_fav = $car_data["car_id"];

            $query2 = "SELECT * FROM cars where car_id = '$car_id_fav'";
            $result2 = mysqli_query($con,$query2);

            while($car_data2 = mysqli_fetch_assoc($result2)){
                $car_id2 = $car_data2["car_id"];
                $model = $car_data2["model"];
                $carname = $car_data2["carname"];
                $year = $car_data2["year"];
                $color = $car_data2["color"];
                $price = $car_data2["price"];
                $distance = $car_data2["distance"];
                $fueltype = $car_data2["fueltype"];
                $engine = $car_data2["engine"];
                $transmission = $car_data2["transmission"];
                $carphoto = $car_data2["carphoto"];

            
    
            
            echo  "<p><img src = images/$carphoto width=250 height=200 align = left </p>";
                
                
            echo "<table>
            <tr><td><b>Car Id:</b></td>
                <td>$car_id2</td></tr>

            <tr><td><b>Car Model:</b></td>
                <td>$model</td></tr>

            <tr><td><b>Full Name:</b></td>
                <td>$carname</td></tr>

            <tr><td><b>Year:</b></td>
                <td>$year</td></tr>

            <tr><td><b>Color:</b></td>
                <td>$color</td></tr>

            <tr><td><b>Price:</b></td>
                <td>$price</td></tr>

            <tr><td><b>Distance:</b></td>
                <td>$distance</td></tr>

            <tr><td><b>Fuel Type:</b></td>
                <td>$fueltype</td></tr>

            <tr><td><b>Engine:</b></td>
                <td>$engine</td></tr>

            <tr><td><b>Transmission:</b></td>
                <td>$transmission</td></tr>
        </table>";
            
            
            
            //echo "<b>&nbsp Car Id:</b> ".$car_id2."<br>"; 
            //echo "<b>&nbsp Car Model:</b> ".$model."<br>";  
            //echo "<b>&nbsp Full Name:</b> ".$carname."<br>";
            //echo "<b>&nbsp Year:</b> ".$year."<br>";
            //echo "<b>&nbsp Color:</b> ".$color."<br>";
            //echo "<b>&nbsp Price:</b> ".$price." $"."<br>";
            //echo "<b>&nbsp Distance:</b> ".$distance." km"."<br>";
            //echo "<b>&nbsp Fuel Type:</b> ".$fueltype."<br>";
            //echo "<b>&nbsp Engine:</b> ".$engine."<br>";
            //echo "<b>&nbsp Transmission:</b> ".$transmission."<br>";
            echo "<form action=deletefavorites.php method = POST>
                        <input type=hidden name=id_car value=$car_id2/>
                          <button>Remove from Favorites</button>  
                    </form>";
            echo "<h1>COMMENTS</h1>";
            $see_comments = "SELECT * FROM comments WHERE car_id = '$car_id2'";
            $see_comments = mysqli_query($con,$see_comments);
            while($row = mysqli_fetch_assoc($see_comments)){
                $comment_name = $row["firstName"];
                $comment = $row["comment"];
                $u_id = $row["user_id"];
                $avatar = "SELECT photo from photos WHERE user_id = '$u_id'";
                $avatar_result = mysqli_query($con,$avatar);
                if(mysqli_num_rows($avatar_result) > 0){
                    $avatar2 = mysqli_fetch_assoc($avatar_result);
                    
                    echo "<p><img src = images/$avatar2[photo] width=75 height=90 align = left> </p>";
                }
                
                echo "<p><b>Name:</b></p> ".$comment_name."<br>";
                echo "<b>Comment:</b> ".$comment."<br><br>";
            }
            echo "<hr>";
            }

            

        } 
        


    }

    else{
        echo "<h1>You have not any car on your favorites list.</h1>"."<br>";
    }



?>    
    
</body>
</html>