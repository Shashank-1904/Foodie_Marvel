<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
  </div>
  <div class="card-body">
    <?php if(isset($_GET['error'])){ ?> 
          <p class="error"><?php echo '<h4>' . $_GET['error'] . '</h4>'; ?> </p>
        <?php } ?>

        <?php if(isset($_GET['success'])){ ?> 
          <p class="success"><?php echo $_GET['success']; ?> </p>
        <?php } ?>
    <div class="table-responsive">
            <?php
                $query = "SELECT * FROM order_info";
                $query_run = mysqli_query($conn,$query);
            ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Order_id</th>
                    <th>UserName</th>
                    <th>Phone</th>
                    <th>Address</th>
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
                               <td><?php echo $row['user_name'];?></td>
                               <td><?php echo $row['user_phone'];?></td>
                               <td><?php echo $row['user_landmark'].','.$row['user_street'];?></td>
                               <td><?php echo $row['method'];?></td> 
                               <td><?php echo $row['total_items'];?></td>
                               <td>Rs. <?php echo $row['total_price'];?> /-</td>
                               <td><?php echo $row['order_status'];?></td>
                                <?php 
                                    if($row['order_status'] === 'Pending')
                                    {
                                    ?>
                                    <td>
                                        <form action="editOrderStatus.php" method="post">
                                            <input type="hidden" name="Order_id" value="<?php echo $row['order_id'];?>" >
                                            <button type="submit" name="edit_btn" class="btn btn-success">Edit Status</button>
                                        </form>
                                    </td>
                                    <?php
                                    }
                                    else
                                    {
                                        ?>
                                    <td>
                                        <a class="btn btn-success">Order Recieved</a>
                                    </td>
                                    <?php
                                    }
                                ?>
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
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>