<?php
include('security.php');

if(isset($_POST['updtqty_btn']))
{
    $i_id = $_POST['item_id'];
    $i_qty = $_POST['updt_qty'];

    $query = "UPDATE cart_info SET item_quantity='$i_qty' WHERE id='$i_id' ";  
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        header("location:cart.php");
    }
    else{
        header("location:index.php");
    }
 
}

?>