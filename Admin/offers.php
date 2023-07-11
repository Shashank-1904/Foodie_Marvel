<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="modal fade" id="addnewoffer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New Offer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="offers_DB.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label> Category </label>
            <input type="text" name="offer_category" class="form-control" placeholder="Dinner/Breakfast/Lunch" required>
          </div>

          <div class="form-group">
            <label> Name of Offer</label>
            <input type="text" name="offer_name" class="form-control" placeholder="Enter Name" required>
          </div>

          <div class="form-group">
            <label> Description </label>
            <input type="text" name="offer_price" class="form-control" placeholder="Enter Price" required>
          </div>

          <div class="form-group">
            <label> Image </label>
            <input type="file" name="offer_img" class="form-control" required>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="addofferbtn" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>




<div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Today's Offers
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnewoffer">
        Add New Offer
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
        
          $query = "SELECT * FROM offers_info";
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
                    <td><?php echo $row['offer_category']; ?></td>
                    <td><?php echo $row['offer_name']; ?></td>
                    <td><?php echo $row['offer_price']; ?></td>
                    <td> <?php echo '<img src="upload/'.$row['offer_images'].'" width="120px" height="100px" alt="img">'?> </td>
                    <td>
                      <form action="editoffers.php" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success">Edit</button>
                      </form>
                    </td>
                    <td>
                      <form action="deleteoffers_DB.php" method="POST">
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