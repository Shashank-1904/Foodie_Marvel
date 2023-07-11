<?php
// include('../security.php');
include('includes/header.php');
include('includes/navbar.php');

if(!isset($_SESSION['user_name']))
{
  header("location:login.php");
  exit();
}
else
{
    $u_id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Admin/css/sb-admin-2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="cart-heading">
    <h1>My Orders</h1>
  </div>
    <div class="card-body">
        <div class="table-responsive">
            <?php
                $query = "SELECT * FROM order_info WHERE user_id='$u_id'";
                $query_run = mysqli_query($conn,$query);
            ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Order_id</th>
                    <th>Payment Mode</th>
                    <th>Items (Qunatity)</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        if(mysqli_num_rows($query_run) > 0)
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                            ?>
                            <tr>
                               <td><?php echo $row['order_id'];?></td>
                               <td><?php echo $row['method'];?></td> 
                               <td><?php echo $row['total_items'];?></td>
                               <td>Rs. <?php echo $row['total_price'];?> /-</td>
                               <td><?php echo $row['order_status'];?></td>
                            </tr>
                            <?php

                            }       
                        }
                        else
                        {
                            echo "No Record Found..!!";
                        }
                    ?>  
                </tbody>
            </table>
        </div>
    </div>    

<?php
include('includes/scripts.php');
include('includes/footer.php');
}
?>

