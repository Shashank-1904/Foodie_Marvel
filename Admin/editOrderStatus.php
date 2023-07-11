<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Order Status</h6>
  </div>
  <div class="card-body">

    <?php
        include('config.php');
        if(isset($_POST['edit_btn']))
        {
            $id = $_POST['Order_id'];
            
            $query = "SELECT * FROM order_info WHERE order_id = '$id'";
            $query_run = mysqli_query($conn,$query);

            foreach($query_run as $row)
            {
              ?>
              <form action="editOrderStatus_DB.php" method="post">
                
                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                    <label>Order Id </label>
                    <input type="text" name="id" value="<?php echo $row['order_id']; ?>" class="form-control" readonly>
                </div>
                
                <div class="form-group">
                    <label> Order Status </label>
                    <input type="text" name="edit_status" value="<?php echo $row['order_status']; ?>" class="form-control" placeholder="Enter status">
                </div>

                <a href="Orders.php" class="btn btn-danger"> Cancel </a>
                <button type="submit" name="update_btn" class="btn btn-primary"> Update </button>
              </form>

              <?php
            }
        }        
    ?>
    

  </div>
</div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>