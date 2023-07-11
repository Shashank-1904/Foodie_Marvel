<?php
include('security.php');

if(!isset($_SESSION['user_name']))
{
  header("location:login.php");
  exit();
}
else
{
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
    <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <style>
      .cart-heading h1{
        font-size:50px;
        color:#dd3636;
        text-align:center;
        font-weight:bold;
        margin-top:2rem;
      }

      .card-body{
        margin-top:2rem;
      }

      .order_btn{
        text-align:center;
      }
      
      .order_btn button,a{
        margin:1.5rem;
      }

      .btn{
        margin:1rem;
      }
     
    </style>
</head>
<body>
  <div class="cart-heading">
    <h1>My cart</h1>
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


          $query = "SELECT * FROM cart_info";
          $query_run = mysqli_query($conn,$query);
          $_SESSION['grand_total'] =0;
        ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Delete</th>
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
                    <td><?php echo '<img src="Admin/upload/'.$row['item_image'].'" width="120px" height="100px" alt="img">'?></td>
                    <td><?php echo $row['item_name']; ?></td>
                    <td>Rs. <?php echo $row['item_price']; ?>/-</td>
                    <td>
                      <form action="updt_cart_DB.php" method="POST">
                        <input type="hidden" name="item_id" value="<?php echo $row['id']; ?>">    
                        <input type="number" id="quantity" name="updt_qty"min='1' value="<?php echo $row['item_quantity']; ?>" max="">
                        <button type="submit" name="updtqty_btn" class="btn btn-success">Update</button>
                      </form> 
                    </td>

                    <td>Rs. <?php echo $sub_total = $row['item_price'] * $row['item_quantity']; ?> /- </td>
                    <!-- <td>
                      
                    </td> -->
                    <td>
                      <form action="delete_cart_item_DB.php" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_item_btn" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr> 
                  <?php

                 $_SESSION['grand_total'] += $sub_total;
                }
            }
            else{
              echo "No Record Found..!!";
            }
            ?>   
          <tr>
            <td><a href="index.php" id="cont_order" class="btn btn-warning">Continue Ordering</a></td>
            <td></td>
            <td></td>
            <td style="text-align:center;">Grand Total :- </td>
            <td>Rs. <?php echo $_SESSION['grand_total'] ?>/-</td>
            <td>
              <form action="delete_items_DB.php" method="post">
                <button type="submit" name="delete_item_btn" class="btn btn-danger">Delete All items</button>
              </form>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
      <div class="order_btn">
          <a href="order_form.php" name="checkout" class="btn btn-success">Procced To Checkout</a>
      </div>  
  </div>
  <script>
     $(document).ready(function(){

var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
            
            $('#quantity').val(quantity + 1);

          
            // Increment
        
    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }
    });
    
});
  </script>
</body>
</html>
<?php
}
?>