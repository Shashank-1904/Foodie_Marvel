<?php
$sname = "localhost";
$usname = "root";
$password = "";

$db_name = "foodie_marvel";

$conn = mysqli_connect($sname, $usname , $password , $db_name);

if(!$conn){
    echo "connection failed..!";
}

?>