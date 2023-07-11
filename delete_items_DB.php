<?php
include('security.php');
if(isset($_POST['delete_item_btn']))
{
    $query = "DELETE FROM cart_info";  
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        header("location:cart.php");
        // header("location: addAdmin.php?success=Your Data is Deleted  Successfully");
        // exit();
    }
    else
    {
        // header("location: addAdmin.php?error=Something Went Wrong");
        // exit();
    }

}

?>
