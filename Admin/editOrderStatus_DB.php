<?php

include("security.php");

if(isset($_POST['update_btn']))
{
    $o_id = $_POST['id'];
    $o_status = $_POST['edit_status'];

    $query = "UPDATE order_info SET  order_status='$o_status' WHERE order_id='$o_id' ";  
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        header("location: Orders.php?success=Your Data is Updated Successfully");
        exit();
    }
    else
    {
        header("location: Orders.php?error=Something Went Wrong");
        exit();
    }
}
?>