<?php 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "users";

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$con)
{
	die("failed to connect!");
}







