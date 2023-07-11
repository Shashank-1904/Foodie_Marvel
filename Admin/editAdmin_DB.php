<?php

include("security.php");

if(isset($_POST['update_btn']))
{
    $a_id = $_POST['edit_id'];
    $a_name = $_POST['edit_username'];
    $a_email = $_POST['edit_email'];
    $a_pwd = $_POST['edit_password'];

    $a_pwd = md5($a_pwd);

    $query = "UPDATE admin_info SET admin_name='$a_name', email='$a_email', password='$a_pwd' WHERE id='$a_id' ";  
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        header("location: addAdmin.php?success=Your Data is Updated Successfully");
        exit();
    }
    else
    {
        header("location: addAdmin.php?error=Something Went Wrong");
        exit();
    }
}

?>