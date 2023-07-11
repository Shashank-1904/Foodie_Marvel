<?php

include("security.php");

if(isset($_POST['update_btn']))
{
    $m_id = $_POST['edit_id'];
    $m_cat = $_POST['edit_category'];
    $m_name = $_POST['edit_name'];
    $m_pr = $_POST['edit_price'];
    $m_img = $_FILES["menu_img"]['name'];

    $del_query = "SELECT * FROM menu_info WHERE id='$m_id'";
    $del_query_run = mysqli_query($conn,$del_query);
    
    foreach($del_query_run as $line)
    {
        if($m_img == NULL)
        {
            //Updaitng data with same image
            $img = $line['menu_images'];
        }
        else
        {
            //Updating data with different images
            if($img_path = "upload/".$line['menu_images'])
            {
                unlink($img_path);
                $img = $m_img;
            }
        }
    }

    $query = "UPDATE menu_info SET menu_category='$m_cat', menu_name='$m_name', menu_price='$m_pr', menu_images='$img' WHERE id='$m_id' ";  
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        if($m_img == NULL)
        {
            //Updaitng data with same image
            header("location: menu.php?success=Your Data is Updated Successfully");
            exit();
        }
        else
        {
            //Updating data with different images
            move_uploaded_file($_FILES["menu_img"]["tmp_name"], "upload/".$_FILES["menu_img"]["name"]);
            header("location: menu.php?success=Your Data is Updated Successfully");
            exit();
        }
    }
    else
    {
        header("location: menu.php?error=Something Went Wrong");
        exit();
    }
}

?>