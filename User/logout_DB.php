<?php
include('../config.php');
session_start();

if(isset($_POST['logout_btn']))
{
    session_destroy();
    unset($_SESSION['user_name']);
    header("location:../index.php");
}

?>