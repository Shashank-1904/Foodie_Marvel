<?php
include("security.php");

if(isset($_POST['delete_btn']))
{
    $a_id = $_POST['delete_id'];

    $query = "DELETE FROM admin_info WHERE id='$a_id' ";  
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        header("location: addAdmin.php?success=Your Data is Deleted  Successfully");
        exit();
    }
    else
    {
        header("location: addAdmin.php?error=Something Went Wrong");
        exit();
    }
}

?>