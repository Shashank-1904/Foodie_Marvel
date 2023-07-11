<?php
include('includes/header.php');
include('includes/navbar.php');
$u_id =  $_SESSION['id'];

?> 


<div class="container">
    <?php
        $query = "SELECT * FROM user_info WHERE id = '$u_id'";
        $query_run = mysqli_query($conn,$query);

        if(mysqli_num_rows($query_run) > 0)
        {
                $row = mysqli_fetch_assoc($query_run);
        }
        

        ?>
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body mt-5">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<?php echo '<img src="user_images/'.$row['user_image'].'">';?>
				</div>
				<h5 class="user-name"><?php echo $row['user_name'];?></h5>
				<h6 class="user-email"><?php echo $row['email'];?></h6>
			</div>
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
    
    <form action="update_profile_DB.php" method="post" enctype="multipart/form-data">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Personal Details</h6>
                    <?php if(isset($_GET['error'])){ ?> 
                    <p class="error"><?php echo '<h4>' . $_GET['error'] . '</h4>'; ?> </p>
                    <?php } ?>

                    <?php if(isset($_GET['success'])){ ?> 
                    <p class="success"><?php echo $_GET['success']; ?> </p>
                    <?php } ?>
			</div>
            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2 mt-2">
				<div class="form-group">
					<label for="fullName">Full Name</label>
					<input type="text" value="<?php echo $row['u_name'];?>" class="form-control" name="edit_name">
				</div>
			</div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
				<div class="form-group">
					<label for="fullName">User Name</label>
					<input type="text" value="<?php echo $row['user_name'];?>" class="form-control" name="edit_username">
				</div>
			</div>

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
				<div class="form-group">
					<label for="eMail">Email</label>
					<input type="email" value="<?php echo $row['email'];?>" class="form-control" name="edit_email">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="text" value="<?php echo $row['phone'];?>" class="form-control" name="edit_phone">
				</div>
			</div>
	
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
				<div class="form-group">
					<label for="password">New Password</label>
					<input type="text" class="form-control" name="new_password" placeholder="New password">
				</div>
			</div>
            
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
				<div class="form-group">
					<label >Profile Image</label>
					<input type="file" name="edit_user_img" value="<?php echo $row['user_images']; ?>" class="form-control">
				</div>
			</div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary">Address</h6>
			</div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="form-group">
					<label for="add">Order Address</label>
					<input type="text" class="form-control" value="<?php echo $row['address']; ?>" name="edit_address" placeholder="address">
				</div>
			</div>
            
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
				<div class="text-right">
					<button type="submit" id="submit" name="update_btn" class="btn btn-primary">Update</button>
				</div>
			</div>
		</div>
    </form>
</div>
</div>
</div>
</div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
