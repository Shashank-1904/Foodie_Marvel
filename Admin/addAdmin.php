<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>



<!-- Modal -->
<div class="modal fade" id="addAdminProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="addAdmin_DB.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label> Username </label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username">
          </div>

          <div class="form-group">
            <label> Email </label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email">
          </div>

          <div class="form-group">
            <label> Password </label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
          </div>

          <div class="form-group">
            <label> Confirm Password </label>
            <input type="password" name="confirm_password" class="form-control" placeholder="Enter Confirm Password">
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="addAdminbtn" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminProfile">
        Add Admin Profile
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


          $query = "SELECT * FROM admin_info";
          $query_run = mysqli_query($conn,$query);
        ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
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
                    <td><?php echo $row['admin_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td>
                      <form action="editAdmin.php" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success">Edit</button>
                      </form>
                    </td>
                    <td>
                      <form action="deleteAdmin_DB.php" method="POST">
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