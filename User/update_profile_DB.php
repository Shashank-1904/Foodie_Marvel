<?php

include("../security.php");

if(isset($_POST['update_btn']))
{
    $u_id = $_POST['edit_id'];
    $u_name = $_POST['edit_name'];
    $u_username = $_POST['edit_username'];
    $u_email = $_POST['edit_email'];
    $u_phone = $_POST['edit_phone'];
    $u_pass = $_POST['new_password'];
    $u_add = $_POST['edit_address'];
    $u_img = $_FILES["edit_user_img"]['name'];

    $del_query = "SELECT * FROM user_info WHERE id='$u_id'";
    $del_query_run = mysqli_query($conn,$del_query);
    
    foreach($del_query_run as $line)
    {
        if($u_img == NULL)
        {
            //Updaitng data with same image
            $img = $line['user_image'];
        }
        else
        {
            //Updating data with different images
            if($img_path = "user_images/".$line['user_image'])
            {
                unlink($img_path);
                $img = $u_img;
            }
        }
    }
    $u_pass = md5($u_pass);

    $query = "UPDATE user_info SET u_name='$u_name', user_name='$u_username', email='$u_email', phone='$u_phone', password='$u_pass', user_image='$img', address='$u_add' WHERE id='$u_id'";  
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        if($u_img == NULL)
        {
            //Updaitng data with same image
            header("location: update_profile.php?success=Your Data is Updated Successfully");
            exit();
        }
        else
        {
            //Updating data with different images
            move_uploaded_file($_FILES["edit_user_img"]["tmp_name"], "user_images/".$_FILES["edit_user_img"]["name"]);
            header("location: update_profile.php?success=Your Data is Updated Successfully");
            exit();
        }
    }
    else
    {
        header("location: update_profile.php?error=Something Went Wrong");
        exit();
    }
}

?>