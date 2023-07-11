<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Menu</h6>
  </div>
  <div class="card-body">

    <?php
        include('config.php');
        if(isset($_POST['edit_btn']))
        {
            $id = $_POST['edit_id'];
            
            $query = "SELECT * FROM menu_info WHERE id = '$id'";
            $query_run = mysqli_query($conn,$query);

            foreach($query_run as $row)
            {
              ?>
              <form action="editmenu_DB.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                    <label> Category </label>
                    <input type="text" name="edit_category" value="<?php echo $row['menu_category']; ?>" class="form-control" placeholder="Enter Category" required>
                </div>

                <div class="form-group">
                    <label> Name </label>
                    <input type="text" name="edit_name" value="<?php echo $row['menu_name']; ?>" class="form-control" placeholder="Enter Name" required>
                </div>

                <div class="form-group">
                    <label> Price </label>
                    <input type="text" name="edit_price" value="<?php echo $row['menu_price']; ?>" class="form-control" placeholder="Enter Price" required>
                </div>

                <div class="form-group">
                    <label> Image </label>
                    <input type="file" name="menu_img" value="<?php echo $row['menu_images']; ?>" class="form-control">
                </div>

                <a href="menu.php" class="btn btn-danger"> Cancel </a>
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