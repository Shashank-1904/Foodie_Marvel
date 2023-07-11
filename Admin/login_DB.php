<?php
include('security.php');

if(isset($_POST['login_btn']))
{
    $a_email = $_POST['log_email'];
    $a_pwd = $_POST['log_password'];

    $a_pwd = md5($a_pwd);

    $query = "SELECT * FROM admin_info WHERE email='$a_email' AND password='$a_pwd'";  
    $query_run = mysqli_query($conn,$query);

    if(mysqli_num_rows($query_run) > 0)
    {
        $row = mysqli_fetch_array($query_run);

        $_SESSION['admin_name'] = $row['admin_name'];
        header("location:index.php");
    }
    else
    {
        header("location: login.php?error=Email ID / Password Invalid");
        exit();
    }
}

?>