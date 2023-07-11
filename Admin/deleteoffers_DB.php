<?php
include("security.php");

if(isset($_POST['delete_btn']))
{
    $o_id = $_POST['delete_id'];

    $del_query = "SELECT * FROM offers_info WHERE id='$o_id'";
    $del_query_run = mysqli_query($conn,$del_query);

    foreach($del_query_run as $line)
    {
        //Deleting data with images
        if($img_path = "upload/".$line['offer_images'])
        {
            unlink($img_path);
        }
    }


    $query = "DELETE FROM offers_info WHERE id='$o_id' ";  
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        header("location: offers.php?success=Your Data is Deleted  Successfully");
        exit();
    }
    else
    {
        header("location: offers.php?error=Something Went Wrong");
        exit();
    }
}

?>