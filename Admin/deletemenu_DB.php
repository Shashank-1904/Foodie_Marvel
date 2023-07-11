<?php
include("security.php");

if(isset($_POST['delete_btn']))
{
    $m_id = $_POST['delete_id'];

    $del_query = "SELECT * FROM menu_info WHERE id='$m_id'";
    $del_query_run = mysqli_query($conn,$del_query);

    foreach($del_query_run as $line)
    {
        //Deleting data with images
        if($img_path = "upload/".$line['menu_images'])
        {
            unlink($img_path);
        }
    }


    $query = "DELETE FROM menu_info WHERE id='$m_id' ";  
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        header("location: menu.php?success=Your Data is Deleted  Successfully");
        exit();
    }
    else
    {
        header("location: menu.php?error=Something Went Wrong");
        exit();
    }
}

?>