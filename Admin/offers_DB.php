<?php 
include('security.php');

if(isset($_POST['addofferbtn'])){
    $o_cat = $_POST['offer_category'];
    $o_name = $_POST['offer_name'];
    $o_pr = $_POST['offer_price'];
    $o_img = $_FILES["offer_img"]['name'];


    if(file_exists("upload/".$_FILES["offer_img"]["name"]))
    {
        $store = $_FILES["offer_img"]["name"];
        header("location: offers.php?error=Image Already Exists".$store);
    }
    else
    {
        $sql2 = "INSERT INTO offers_info (offer_category,offer_name,offer_price,offer_images) Values ('$o_cat','$o_name','$o_pr','$o_img')";  
        $result2 = mysqli_query($conn , $sql2);

        if($result2)
        {
            move_uploaded_file($_FILES["offer_img"]["tmp_name"], "upload/".$_FILES["offer_img"]["name"]);
            header("location: offers.php?success=New Offer Added");
            exit();
        }
        else
        {
            header("location: offers.php?error=New Offer Not Added");
        }
    }
}