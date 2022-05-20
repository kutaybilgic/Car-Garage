<!DOCTYPE html>
<?php 
    ob_start();
    session_start();
    include("connection.php");
    include("check_login.php");
    include("logeventfunc.php");
?>

<html >
<head>
    <title>Sell Your Car</title>
</head>
<body style="background-color:powderblue;">   
    <h1>Please enter your car's informatin</h1>
    <form action="" method = "POST" enctype="multipart/form-data">
    <label for="model">Model</label>
    <select id="model" name="model" size="5">
        <option selected value="Acura">Acura</option>
        <option value="Aion">Aion</option>
        <option value="Alfa Romeo">Alfa Romeo</option>
        <option value="Anadol ">Anadol </option>
        <option value="Aston Martin">Aston Martin</option>
        <option value="Audi ">Audi </option>
        <option value="Bentley">Bentley</option>
        <option value="BMW">BMW</option>
        <option value="Bugatti">Bugatti</option>
        <option value="Buick">Buick</option>
        <option value="Cadillac ">Cadillac </option>
        <option value="Caterham">Caterham</option>
        <option value="Chery ">Chery </option>
        <option value="Chevrolet">Chevrolet</option>
        <option value="Chrysler">Chrysler</option>
        <option value="Citroen ">Citroen</option>
        <option value="Dacia">Dacia</option>
        <option value="Daewoo">Daewoo</option>
        <option value="Daihatsu">Daihatsu</option>
        <option value="Dodge">Dodge</option>
        <option value="DS Automobiles">DS Automobiles</option>
        <option value="Eagle">Eagle</option>
        <option value="Ferrari">Ferrari</option>
        <option value="Fiat ">Fiat </option>
        <option value="Fisker">Fisker</option>
        <option value="Ford">Ford</option>
        <option value="GAZ">GAZ</option>
        <option value="Geely">Geely</option>
        <option value="Honda">Honda</option>
        <option value="Hyundai">Hyundai</option>
        <option value="Ikco">Ikco</option>
        <option value="Infiniti">Infiniti</option>
        <option value="Jaguar ">Jaguar </option>
        <option value="Katren">Katren</option>
        <option value="Kia">Kia</option>
        <option value="Lada">Lada</option>
        <option value="Lamborghini">Lamborghini</option>
        <option value="Lexus">Lexus</option>
        <option value="Lincoln">Lincoln</option>
        <option value="Lotus">Lotus</option>
        <option value="Marcos ">Marcos </option>
        <option value="Maserati">Maserati</option>
        <option value="Mazda">Mazda</option>
        <option value="McLaren">McLaren</option>
        <option value="Mercedes - Benz">Mercedes - Benz</option>
        <option value="MG">MG</option>
        <option value="Mini">Mini</option>
        <option value="Mitsubishi">Mitsubishi</option>
        <option value="Moskwitsch">Moskwitsch</option>
        <option value="Nissan">Nissan</option>
        <option value="Opel">Opel</option>
        <option value="Peugeot">Peugeot</option>
        <option value="Plymouth ">Plymouth </option>
        <option value="Pontiac ">Pontiac </option>
        <option value="Porsche">Porsche</option>
        <option value="Proton">Proton</option>
        <option value="Renault">Renault</option>
        <option value="Rolls-Royce">Rolls-Royce</option>
        <option value="Rover">Rover</option>
        <option value="Saab ">Saab </option>
        <option value="Seat">Seat</option>
        <option value="Skoda">Skoda</option>
        <option value="Smart">Smart</option>
        <option value="Subaru">Subaru</option>
        <option value="Suzuki">Suzuki</option>
        <option value="Tata">Tata</option>
        <option value="Tesla">Tesla</option>
        <option value="Tofas ">Tofas </option>
        <option value="Toyota ">Toyota </option>
        <option value="Volkswagen">Volkswagen</option>
        <option value="Volvo ">Volvo </option>
        </select><br><br>
    
    <label for="car_name">Car Full Name</label>
    <input type="text" name = "car_name" id = "car_name"> Example:Renault Clio <br><br>

    <label for="year">Year</label>
    <input type="text" name = "year" id = "year"><br><br>

    <label for="color">Color</label>
    <input type="text" name = "color" id = "color"><br><br>

    <label for="price">Price</label>
    <input type="text" name = "price" id = "price" > $ <br><br>

    <label for="distance">Distance</label>
    <input type="distance" name = "distance" id = "distance"> km <br><br>

    <label for="fueltype">Fuel type</label>
    <select id="fueltype" name="fueltype" size="3">
        <option selected value="Gasoline">Gasoline</option>
        <option value="Diesel">Diesel</option>
        <option value="LPG">LPG</option>
        </select><br><br>
    
    <label for="engine">Engine</label>
    <input type="engine" name = "engine" id = "engine"><br><br>

    <label for="transmission">Transmission</label>
    <select id="transmission" name="transmission" size="3">
        <option selected value="Automatic">Automatic</option>
        <option value="Semi-Automatic">Semi-Automatic</option>
        <option value="Manuel">Manuel</option>
        </select><br><br>

    Select car image to upload:
    <input type="file" name="fileupload" id="fileupload"><br>    

    <button> Submit</button>
    <button><a href="user_panel.php">Go Back</a></button>

    </form>
<?php 

if($_POST){
    $model = $_POST["model"];
    $carname = $_POST["car_name"];
    $year = $_POST["year"];
    $color = $_POST["color"];
    $price = $_POST["price"];
    $distance = $_POST["distance"];
    $fueltype = $_POST["fueltype"];
    $engine = $_POST["engine"];
    $distance = $_POST["distance"];
    $transmission = $_POST["transmission"];

    $name = $_FILES["fileupload"]["name"];

    $temp_query = "SELECT carphoto from cars WHERE user_id = '$_SESSION[user_id]'";
    $result = mysqli_query($con,$temp_query);
    $num_recipes = mysqli_num_rows($result);
    

    if(!empty($model) && !empty($carname) && !empty($year) && !empty($color) && !empty($price) && !empty($distance) && !empty($fueltype) && !empty($engine) && !empty($distance) && !empty($transmission)){
        
            if(!empty($name)){
                

                $img_ex = pathinfo($name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed = array("jpg","jpeg","png");
                if(in_array($img_ex_lc,$allowed)){


                    $query = "INSERT INTO cars (user_id,model,carname,year,color,price,distance,fueltype,engine,transmission,carphoto)
                    values ('$_SESSION[user_id]','$model','$carname','$year','$color','$price','$distance','$fueltype','$engine','$transmission','$name')";
                    mysqli_query($con,$query);
                    $filepath = "C:/xampp/htdocs/images/".$_FILES["fileupload"]["name"];
                    move_uploaded_file($_FILES["fileupload"]["tmp_name"], $filepath);
                    echo "Your car has been successfully added to the sales list.";
                    logEvent('User '.$_SESSION["firstName"].' '.$_SESSION["lastName"].' put a car up for sale.');
                    header("Refresh:3 ; url=user_panel.php");
                    
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
        echo "Please enter the all information!";
    }

}

ob_flush();
?>
</body>
</html>