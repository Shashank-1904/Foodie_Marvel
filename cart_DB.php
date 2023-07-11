<?php
include('security.php');

if(!isset($_SESSION['user_name']))
{
  header("location:login.php");
  exit();
}
else
{

    if(isset($_POST['addcartbtn']))
    {
        $i_id = $_POST['item_id'];
        $i_qty = 1;

        $query = "SELECT * FROM offers_info WHERE id = '$i_id'";
        $query_run = mysqli_query($conn,$query);

        if(mysqli_num_rows($query_run) > 0)
        {
            $row = mysqli_fetch_assoc($query_run);
        }

        $i_name = $row['offer_name'];
        $i_price = $row['offer_price'];
        $i_img = $row['offer_images'];

        $sql = "SELECT * FROM cart_info WHERE item_name ='$i_name'";
        $res1 = mysqli_query($conn,$sql);

        if(mysqli_num_rows($res) > 0)
        {
            $msg[] = "Item already added";
        }
        else{
            $sql2 = "INSERT INTO cart_info (item_name,item_price,item_image,item_quantity) VALUES ('$i_name','$i_price','$i_img','$i_qty')";
            $res2 = mysqli_query($conn,$sql2);
            
            if($res2)
            {
                header("location: index.php?success=Item Added to the cart");
            }
            else
            {
                header("location: index.php?error=something went wrong");
            }
        }
        
    }
}
?>