<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="modal fade" id="addnewmenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New Menu Item</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="menu_DB.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label> Category</label>
              <select name="menu_category" id="">
                <option value="Main">Main(chinese,maggi)</option>
                <option value="Pizza">Pizza/Burger</option>
                <option value="sandwich">sandwich/Rolls</option>
                <option value="Drinks">Drinks</option>
                <option value="Desert">Desert</option>
              </select>
            <!-- <input type="text" name="menu_category" class="form-control" placeholder="Dinner/Breakfast/Lunch" required> -->
          </div>

          <div class="form-group">
            <label> Name of Menu Item</label>
            <input type="text" name="menu_name" class="form-control" placeholder="Enter Name" required>
          </div>

          <div class="form-group">
            <label> Description </label>
            <input type="text" name="menu_price" class="form-control" placeholder="Enter Price" required>
          </div>

          <div class="form-group">
            <label> Image </label>
            <input type="file" name="menu_img" class="form-control" required>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="addmenubtn" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>




<div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Our Menu
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnewmenu">
        Add New Menu Item
      </button>
    </h6>
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
        
          $query = "SELECT * FROM menu_info";
          $query_run = mysqli_query($conn,$query);
        
        ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Edit</th>
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
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['menu_category']; ?></td>
                    <td><?php echo $row['menu_name']; ?></td>
                    <td><?php echo $row['menu_price']; ?></td>
                    <td> <?php echo '<img src="upload/'.$row['menu_images'].'" width="120px" height="100px" alt="img">'?> </td>
                    <td>
                      <form action="editmenu.php" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success">Edit</button>
                      </form>
                    </td>
                    <td>
                      <form action="deletemenu_DB.php" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr> 
                  <?php
                }
            }
            else{
              echo "No Record Found..!!";
            }
            ?>
            
        </tbody> 
      </table>
    </div>
  </div>
</div>

</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>