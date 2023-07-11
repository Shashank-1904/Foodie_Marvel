<?php
include("security.php");

if(isset($_POST['delete_item_btn']))
{
    $i_id = $_POST['delete_id'];

    $query = "DELETE FROM cart_info WHERE id='$i_id' ";  
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