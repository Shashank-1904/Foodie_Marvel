<?php

include("security.php");

if(isset($_POST['update_btn']))
{
    $o_id = $_POST['edit_id'];
    $o_cat = $_POST['edit_category'];
    $o_name = $_POST['edit_name'];
    $o_pr = $_POST['edit_price'];
    $o_img = $_FILES["offer_img"]['name'];

    $del_query = "SELECT * FROM offers_info WHERE id='$o_id'";
    $del_query_run = mysqli_query($conn,$del_query);
    
    foreach($del_query_run as $line)
    {
        if($o_img == NULL)
        {
            //Updaitng data with same image
            $img = $line['offer_images'];
        }
        else
        {
            //Updating data with different images
            if($img_path = "upload/".$line['offer_images'])
            {
                unlink($img_path);
                $img = $o_img;
            }
        }
    }

    $query = "UPDATE offers_info SET offer_category='$o_cat', offer_name='$o_name', offer_price='$o_pr', offer_images='$img' WHERE id='$o_id' ";  
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        if($o_img == NULL)
        {
            //Updaitng data with same image
            header("location: offers.php?success=Your Data is Updated Successfully");
            exit();
        }
        else
        {
            //Updating data with different images
            move_uploaded_file($_FILES["offer_img"]["tmp_name"], "upload/".$_FILES["offer_img"]["name"]);
            header("location: offers.php?success=Your Data is Updated Successfully");
            exit();
        }
    }
    else
    {
        header("location: offers.php?error=Something Went Wrong");
        exit();
    }
}

?>