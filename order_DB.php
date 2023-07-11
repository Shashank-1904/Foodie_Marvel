<?php
include('security.php');

if(isset($_POST['checkout']))
{
    $u_id = $_POST['user_id'];
    $u_name= $_POST['username'];
    $u_email = $_POST['email'];
    $u_phone = $_POST['phone'];
    $u_str = $_POST['street'];
    $u_land = $_POST['landmark'];
    $grand_total = $_SESSION['grand_total'];
    $method = $_POST['radio-group'];
    $status = 'Pending';

    if($method === 'Cash On Delivery')
    {
        $method = 'Cash On Delivery';
    }

    $query = "SELECT * FROM cart_info";
    $query_run = mysqli_query($conn,$query);

    if(mysqli_num_rows($query_run) > 0)
    {
        while($row = mysqli_fetch_assoc($query_run))
        {
            $item_name[] = $row['item_name'] .'('. $row['item_quantity'].')';
        }
    }
    $total_item = implode(',',$item_name);
    
    $sql = "INSERT INTO order_info (user_id,user_name,user_email,user_phone,user_street,user_landmark,method,total_items,total_price,order_status) VALUES 
            ('$u_id','$u_name','$u_email','$u_phone','$u_str','$u_land','$method','$total_item','$grand_total','$status')";
    $result = mysqli_query($conn,$sql);

    if($result)
    {
        $sql2 = "DELETE FROM cart_info";
        $result2 = mysqli_query($conn,$sql2);
        $_SESSION['grand_total'] = 0;
        echo "<script>alert('ordered Successfully');</script>";
    }
    else
    {
        echo "<script>error</script></script>";
    }
}

?>
