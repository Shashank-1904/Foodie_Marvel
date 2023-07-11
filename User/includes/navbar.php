   <?php
    include('../security.php');

        $u_id = $_SESSION['id'];
        $query = "SELECT * FROM user_info WHERE id = '$u_id'";
        $query_run = mysqli_query($conn,$query);

        if(mysqli_num_rows($query_run) > 0)
        {
                $row = mysqli_fetch_assoc($query_run);
        }
        
    ?>
   
   <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../Res/logobg.png" alt="">
            </div>

            <span class="logo_name">FoodieMarvel</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="main_profile.php">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Profile</span>
                </a></li>
                <li><a href="myorder.php">
                    <i class="uil uil-restaurant"></i>
                    <span class="link-name">My Orders</span>
                </a></li>
                <li><a href="update_profile.php">
                    <i class="uil uil-user-check"></i>
                    <span class="link-name">Update Profile</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li>
                    <a href="../index.php">
                        <i class="uil uil-home"></i>
                        <span class="link-name">Back to HomePage</span>
                    </a>    
                </li>
                <li>
                    <form action="logout_DB.php" method="post">
                        <button type="submit" name="logout_btn">
                            <a href="#">
                                <i class="uil uil-signout"></i>
                                <span class="link-name">Logout</span>
                            </a>    
                        </button>
                    </form>
                </li>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </ul>
        </div>
    </nav>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <?php echo '<img src="user_images/'.$row['user_image'].'">';?>
        </div>
