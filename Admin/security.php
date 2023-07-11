<?php
session_start();
include('config.php');

if(!$dbconfig){
    header("Location : config.php");
}

if(!isset($_SESSION['admin_name']))
{
    header("location:login.php");
}
?>