<?php
// include('../security.php');
include('includes/header.php');
include('includes/navbar.php');

$u_id =  $_SESSION['id'];

?> 


<div class="container emp-profile">
    <div class="cart-heading">
    <h1>My Profile</h1>
  </div>
    <?php
        $query = "SELECT * FROM user_info WHERE id = '$u_id'";
        $query_run = mysqli_query($conn,$query);

        if(mysqli_num_rows($query_run) > 0)
        {
                $row = mysqli_fetch_assoc($query_run);
        }
        

        ?>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <?php echo '<img src="user_images/'.$row['user_image'].'">';?>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="profile-head">
                    <h5><?php echo $row['user_name'];?></h5>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About You</a>
                        </li>
                    </ul>
                </div>
                
                                    
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">                        
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>                                            
                            <div class="col-md-6">                            
                                <p><?php echo $row['u_name'];?></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label>User Name</label>
                            </div>                                            
                            <div class="col-md-6">                            
                                <p><?php echo $row['user_name'];?></p>
                            </div>
                        </div>
                                        
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $row['email'];?></p>
                            </div>
                        </div>
                                        
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $row['phone'];?></p>
                            </div>
                        </div>
                                        
                        <div class="row">
                            <div class="col-md-6">
                                <label>Password</label>
                            </div>
                            
                            <div class="col-md-6">
                                <p><?php echo $row['password'];?></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label>Address</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $row['address'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>              
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>


            