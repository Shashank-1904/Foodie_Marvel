<?php 
include('security.php');

if(isset($_POST['addmenubtn'])){
    $m_cat = $_POST['menu_category'];
    $m_name = $_POST['menu_name'];
    $m_pr = $_POST['menu_price'];
    $m_img = $_FILES["menu_img"]['name'];


    if(file_exists("upload/".$_FILES["menu_img"]["name"]))
    {
        $store = $_FILES["menu_img"]["name"];
        header("location: menu.php?error=Image Already Exists".$store);
    }
    else
    {
        $sql2 = "INSERT INTO menu_info (menu_category,menu_name,menu_price,menu_images) Values ('$m_cat','$m_name','$m_pr','$m_img')";  
        $result2 = mysqli_query($conn , $sql2);

        if($result2)
        {
            move_uploaded_file($_FILES["menu_img"]["tmp_name"], "upload/".$_FILES["menu_img"]["name"]);
            header("location: menu.php?success=New menu Added");
            exit();
        }
        else
        {
            header("location: menu.php?error=New menu Not Added");
        }
    }
}