
<?php if (!(isset($_SESSION["firstName"]))){
    header("Location:home.php");
    exit();
    //This function checks if the any user log in or not in every php pages.
    //If any user not logs in,when try to get in for example http://localhost/editprofile.php it directs to the home page automaticly.
} ?>