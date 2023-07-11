<?php
include('security.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FoodieMarvel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="css/swiper-bundle.min.css" />

    <link
	  rel="stylesheet"
	  href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
	/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
  <body>
    <!-- header section starts -->
    <header class="header">
        <a href="index.php" class="logo">
            <img src="Res/Logobg.png" alt="">
        </a>

        <ul class="navbar">
            <li><a href="#home" class="active">Home</a></li>
            <li><a href="#aboutus">About Us</a></li>
            <li><a href="#offers">Offers</a></li>
            <li><a href="#service">Services</a></li>
            <li><a href="#menu-page">Menu</a></li>
            <li><a href="#contactus">Contact Us</a></li>
        </ul>

        <div class="right">
            <?php
              if(!isset($_SESSION['user_name']))
              {
                ?>
                  <a href="login.php" id="popup-btn" class="user">
                  <i class="ri-shopping-cart-2-line"></i>
                <?php
              }
              elseif(isset($_SESSION['user_name']))
              {
                $query = "SELECT * FROM cart_info";
                $res = mysqli_query($conn,$query);
                $row_count = mysqli_num_rows($res);
                ?> 
                <a href="cart.php" id="popup-btn" class="user">
                <i class="ri-shopping-cart-2-line"></i> <?php echo $row_count;?>
               <?php 
              }
            ?>

            <?php
              if(!isset($_SESSION['user_name']))
              {
                ?>
                  <a href="login.php" id="popup-btn" class="user">
                  <i class="ri-user-fill"></i>Sign In
                <?php
              }
              elseif(isset($_SESSION['user_name']))
              {
                ?> 
                <a href="User/main_profile.php" id="popup-btn" class="user">
                <i class="ri-user-fill"></i><?php echo $_SESSION['user_name'];?>
               <?php 
              }
            ?>
                
            </a>
            <a href="#" class="ri-menu-line" id="menu-btn"></a>
        </div>
  </header> 
  <!-- header section ends -->

    <!-- home section starts -->

    <section class="home" id="home" style="background-image: url(Res/bg.png);">
        
        <div class="row">    
            <div class="col">
                <div class="home-text">
                    <h2 class="heading1">Welcome to </h2>
                    <h2 class="heading2">Foodie Marvel</h2>
                    <h2> Really Fresh & Tasty..!</h2>
                    <a href="#menu-page" class="btn">Explore Our Menu</a>
                </div>
            </div>

            <div class="col">
                <div class="slide_contain">
                    <div class="slide_wrapper">
                        <img src="res/21316.JPEG" alt="">
                        <img src="res/pastries-2133439.jpg" alt="">
                        <img src="res/21316.JPEG" alt="">
                        <img src="res/21316.JPEG" alt="">
                        <img src="res/21316.JPEG" alt="">
                        <img src="res/21316.JPEG" alt="">
                        <img src="res/21316.JPEG" alt="">
                        <img src="res/21316.JPEG" alt="">
                        <img src="res/21316.JPEG" alt="">
                        <img src="res/21316.JPEG" alt="">
                    </div>
                </div>
            </div>    
        </div>
        
    </section>

    <!-- home section ends -->

    <!-- aboutus section starts -->
    <section id="aboutus">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="img-container1">
                                <img src="Res/about-1.jpg" class="img1" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="img-container2">
                                <img src="Res/coffee-shop-5080266.jpg" class = "img2" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h1>About Us</h1>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda ab recusandae expedita tempora nemo maiores. Esse repellendus temporibus consectetur laborum eveniet molestiae. Fugiat odio nam quas doloremque necessitatibus, minus doloribus?</p>
                    <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic illum laboriosam, odio nam debitis aut esse architecto voluptatem reprehenderit perferendis ut quo. Corrupti consequuntur facilis minus, ipsam dolore quisquam sed?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Id facilis iusto repellendus beatae et necessitatibus consectetur ea eius veritatis illum, nostrum ducimus nobis doloribus, soluta, sint exercitationem! Alias, eveniet hic.
                    </p>
                    <a href="#contactus" class="btn">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
    <!-- aboutus section ends -->

    <!-- Offers Section Starts -->
    <section id="offers" class="offer" style="background-image: url(Res/bg.png);">
      <h1>Todya's Special Meal</h1>
      <h3> We offer you today Very Delecious Meal </h3>
      <button class="slider__control prev"><i class="fa-solid fa-chevron-left"></i></button>
      <button class="slider__control next"><i class="fa-solid fa-chevron-right"></i></button>
      <div class="slider__container" data-multislide="true" data-step="4">
        <?php
        
          $query = "SELECT * FROM offers_info";
          $query_run = mysqli_query($conn,$query);
    
          if(mysqli_num_rows($query_run) > 0)
          {
            while($row = mysqli_fetch_assoc($query_run))
            {
              ?>
            
                <div class="slider__item">
                  <div class="portfolio gallery">
                    <div class="item">
                      <form action="cart_DB.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="item_id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>"> 
                          <div class="thumb">
                          
                            <a href="#" class="category"><?php echo $row['offer_category']; ?></a>
                            <?php echo '<img src="Admin/upload/'.$row['offer_images'].'" alt="img">'?>
                          </div>
                          
                          <div class="text">
                            <h3><a href="#"><?php echo $row['offer_name']; ?></a></h3>
                            <p>Rs.<?php echo $row['offer_price']; ?>/-</p>
                            <input type="hidden" name="item_qty" required min="1" value="1" max="99" maxlength="2" class="qty">
                            
                            <button type="submit" name="addcartbtn" class="view">Add to Cart<span class="fa-solid fa-angle-right"></span></button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
            
              
              <?php
            }
          }
          else{
            echo "No Record Found..!!";
          }
        ?>
    </section>    

    <!-- offers Section ends -->



    <!-- Service Strats -->
    <section id="service" class="serv_wrapper">
      <div class="container">
        <h1 style="text-align:center;">Services</h1>
        <h3>What We Offer You</h3>
            <div class="row" style="margin-top: 50px;">
              <div class="col-lg-4">
                <div class="services-block-three">
                  <a>
                    <div class="padding-15px-bottom">
                      <i>
                        <img src="Res/service/chef (2).png">
                      </i>
                    </div>
                    <h4>Master Chefs</h4>
                    <p class="xs-font-size13 xs-line-height-22"></p>
                  </a>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="services-block-three">
                  <a>
                    <div class="padding-15px-bottom">
                      <img src="Res/service/recommended-food.png">
                    </div>
                    <h4>Quality Food</h4>
                    <p class="xs-font-size13 xs-line-height-22"></p>
                  </a>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="services-block-three">
                  <a>
                    <div class="padding-15px-bottom">
                      <img src="Res/service/online-shopping.png">
                    </div>
                    <h4>Online Order</h4>
                    <p class="xs-font-size13 xs-line-height-22"></p>
                  </a>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="services-block-three">
                  <a>
                    <div class="padding-15px-bottom">
                      <img src="Res/service/food-safety.png">
                    </div>
                    <h4>Fresh Food</h4>
                    <p class="xs-font-size13 xs-line-height-22"></p>
                  </a>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="services-block-three">
                  <a>
                    <div class="padding-15px-bottom">
                      <img src="Res/service/funding.png">
                    </div>
                    <h4>Affordable</h4>
                    <p class="xs-font-size13 xs-line-height-22"></p>
                  </a>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="services-block-three">
                  <a>
                    <div class="padding-15px-bottom">
                      <img src="Res/service/fast-delivery.png">
                    </div>
                    <h4>Fast Delivery</h4>
                    <p class="xs-font-size13 xs-line-height-22"></p>
                  </a>
                </div>
              </div>
            </div>
      </div>
    </section>
    <!-- Service Ends -->

    <!-- Menu Starts -->

    <section class="menu-page" id="menu-page" style="background-image: url(Res/bg.png);">
      <h1>Menu & Our Dishes</h1>
      <div class="tabs effect-1">
        <!-- tab-title -->
        <input type="radio" id="tab-1" name="tab-effect-1" checked="checked">
        <span>Main</span>
  
        <input type="radio" id="tab-2" name="tab-effect-1">
        <span>Pizza & Burger</span>
  
        <input type="radio" id="tab-3" name="tab-effect-1">
        <span>Sandwich & Rolls</span>

        <input type="radio" id="tab-4" name="tab-effect-1">
        <span>Drinks</span>

        <input type="radio" id="tab-5" name="tab-effect-1">
        <span>Dessert</span>
  
        <!-- tab-content -->
        <div class="tab-content">

          <!-- Main Starts (Includes chinese,maggi & pasta,quick and happy bits)-->
          <section id="tab-item-1">
            <button class="slider__control prev"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="slider__control next"><i class="fa-solid fa-chevron-right"></i></button>
            <div class="slider__container" data-multislide="true" data-step="4">
              <?php
        
                  $query = "SELECT * FROM menu_info WHERE menu_category='Main'";
                  $query_run = mysqli_query($conn,$query);
            
                  if(mysqli_num_rows($query_run) > 0)
                  {
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                      ?>
                    
                    <div class="slider__item">
                      <div class="portfolio gallery">
                        <div class="item">
                          <form action="cart_DB2.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="item_id" value="<?php echo $row['id']; ?>">
                              <div class="thumb">
                              
                                <a href="#" class="category"><?php echo $row['menu_category']; ?></a>
                                <?php echo '<img src="Admin/upload/'.$row['menu_images'].'" alt="img">'?>
                              </div>
                              
                              <div class="text">
                                <h3><a href="#"><?php echo $row['menu_name']; ?></a></h3>
                                <p>Rs.<?php echo $row['menu_price']; ?>/-</p>
                                <input type="hidden" name="item_qty" required min="1" value="1" max="99" maxlength="2" class="qty">
                                
                                <button type="submit" name="addcartbtn" class="view">Add to Cart<span class="fa-solid fa-angle-right"></span></button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  <?php
              }
            }
            else{
              echo "No Record Found..!!";
            }
          ?>
          </section>

          <!-- Main Ends (Includes chinese,maggi & pasta,quick and happy bits)-->


          
          <!-- Pizza's And Burger Statrs -->
          
          <section id="tab-item-2">
            <button class="slider__control prev"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="slider__control next"><i class="fa-solid fa-chevron-right"></i></button>
            <div class="slider__container" data-multislide="true" data-step="4">
              <?php
        
                  $query = "SELECT * FROM menu_info WHERE menu_category='Pizza'";
                  $query_run = mysqli_query($conn,$query);
            
                  if(mysqli_num_rows($query_run) > 0)
                  {
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                      ?>
                    
                    <div class="slider__item">
                      <div class="portfolio gallery">
                        <div class="item">
                          <form action="cart_DB2.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="item_id" value="<?php echo $row['id']; ?>">
                              <div class="thumb">
                              
                                <a href="#" class="category"><?php echo $row['menu_category']; ?></a>
                                <?php echo '<img src="Admin/upload/'.$row['menu_images'].'" alt="img">'?>
                              </div>
                              
                              <div class="text">
                                <h3><a href="#"><?php echo $row['menu_name']; ?></a></h3>
                                <p>Rs.<?php echo $row['menu_price']; ?>/-</p>
                                <input type="hidden" name="item_qty" required min="1" value="1" max="99" maxlength="2" class="qty">
                                
                                <button type="submit" name="addcartbtn" class="view">Add to Cart<span class="fa-solid fa-angle-right"></span></button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  <?php
              }
            }
            else{
              echo "No Record Found..!!";
            }
          ?>
          </section>

          <!-- Pizza's And Burger Ends -->

          
          <!-- Sandwich and Rolls Starts (wrap included) -->

          <section id="tab-item-3">
            <button class="slider__control prev"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="slider__control next"><i class="fa-solid fa-chevron-right"></i></button>
            <div class="slider__container" data-multislide="true" data-step="4">
            <?php
        
                  $query = "SELECT * FROM menu_info WHERE menu_category='Sandwich'";
                  $query_run = mysqli_query($conn,$query);
            
                  if(mysqli_num_rows($query_run) > 0)
                  {
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                      ?>
                    
                    <div class="slider__item">
                      <div class="portfolio gallery">
                        <div class="item">
                          <form action="cart_DB2.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="item_id" value="<?php echo $row['id']; ?>">
                              <div class="thumb">
                              
                                <a href="#" class="category"><?php echo $row['menu_category']; ?></a>
                                <?php echo '<img src="Admin/upload/'.$row['menu_images'].'" alt="img">'?>
                              </div>
                              
                              <div class="text">
                                <h3><a href="#"><?php echo $row['menu_name']; ?></a></h3>
                                <p>Rs.<?php echo $row['menu_price']; ?>/-</p>
                                <input type="hidden" name="item_qty" required min="1" value="1" max="99" maxlength="2" class="qty">
                                
                                <button type="submit" name="addcartbtn" class="view">Add to Cart<span class="fa-solid fa-angle-right"></span></button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  <?php
              }
            }
            else{
              echo "No Record Found..!!";
            }
          ?>
          </section>

          <!-- Sandwich and Rolls Ends (wrap included) -->

          <!-- Drinks Starts( includes Cold-Sip, Hot-sip, Shakes, Smoothie, Mocktail) -->

          <section id="tab-item-4">
            <button class="slider__control prev"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="slider__control next"><i class="fa-solid fa-chevron-right"></i></button>
            <div class="slider__container" data-multislide="true" data-step="4">
              <?php
        
                  $query = "SELECT * FROM menu_info WHERE menu_category='Drinks'";
                  $query_run = mysqli_query($conn,$query);
            
                  if(mysqli_num_rows($query_run) > 0)
                  {
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                      ?>
                    
                    <div class="slider__item">
                      <div class="portfolio gallery">
                        <div class="item">
                          <form action="cart_DB2.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="item_id" value="<?php echo $row['id']; ?>">
                              <div class="thumb">
                              
                                <a href="#" class="category"><?php echo $row['menu_category']; ?></a>
                                <?php echo '<img src="Admin/upload/'.$row['menu_images'].'" alt="img">'?>
                              </div>
                              
                              <div class="text">
                                <h3><a href="#"><?php echo $row['menu_name']; ?></a></h3>
                                <p>Rs.<?php echo $row['menu_price']; ?>/-</p>
                                <input type="hidden" name="item_qty" required min="1" value="1" max="99" maxlength="2" class="qty">
                                
                                <button type="submit" name="addcartbtn" class="view">Add to Cart<span class="fa-solid fa-angle-right"></span></button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  <?php
              }
            }
            else{
              echo "No Record Found..!!";
            }
          ?>
          </section>

          <!-- Drinks Ends (includes Cold-Sip, Hot-sip, Shakes, Smoothie, Mocktail)-->


          <!-- Desert Starts -->

          <section id="tab-item-5">
            <button class="slider__control prev"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="slider__control next"><i class="fa-solid fa-chevron-right"></i></button>
            <div class="slider__container" data-multislide="true" data-step="4">
              <?php
        
                  $query = "SELECT * FROM menu_info WHERE menu_category='Desert'";
                  $query_run = mysqli_query($conn,$query);
            
                  if(mysqli_num_rows($query_run) > 0)
                  {
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                      ?>
                    
                    <div class="slider__item">
                      <div class="portfolio gallery">
                        <div class="item">
                          <form action="cart_DB2.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="item_id" value="<?php echo $row['id']; ?>">
                              <div class="thumb">
                              
                                <a href="#" class="category"><?php echo $row['menu_category']; ?></a>
                                <?php echo '<img src="Admin/upload/'.$row['menu_images'].'" alt="img">'?>
                              </div>
                              
                              <div class="text">
                                <h3><a href="#"><?php echo $row['menu_name']; ?></a></h3>
                                <p>Rs.<?php echo $row['menu_price']; ?>/-</p>
                                <input type="hidden" name="item_qty" required min="1" value="1" max="99" maxlength="2" class="qty">
                                
                                <button type="submit" name="addcartbtn" class="view">Add to Cart<span class="fa-solid fa-angle-right"></span></button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  <?php
              }
            }
            else{
              echo "No Record Found..!!";
            }
          ?>
          </section>

          <!-- Desert Ends -->
        </div>
      </div>
    </section>


    <!-- Menu Ends -->

    <!-- Counter Starts -->
    <section class="counter-section">
      <div class="count-wrapper">
        <div class="count-container">
          <i class="fa-solid fa-utensils"></i>
          <span class="count-num" data-val="350">000</span>
          <span class="count-text">Meals Delivered</span>
        </div>
        <div class="count-container">
          <i class="fa-regular fa-face-smile"></i>
          <span class="count-num" data-val="250">000</span>
          <span class="count-text">Daily Customer</span>
        </div>
        <div class="count-container">
          <i class="fa-solid fa-bars"></i>
          <span class="count-num" data-val="325">000</span>
          <span class="count-text">Menu Items</span>
        </div>
      </div>
    </section>
    
    <!-- Counter Ends -->



    <!-- Team strats -->

    <section id="team" style="background-image: url(Res/bg.png);">
      <h1> Our Team</h1>
      <h3> The Geniuses Behind Our Work</h3>
      <div class="main">
        <div class="profile-card">
            <div class="img">
                <img src="Res/Team/Pravin.jpg">
            </div>
            <div class="caption">
                <h2>Pravin Chopade</h2>
                <p>Owner</p>
                <div class="social-links">
                    <a href="https://hi-in.facebook.com/people/Pravin-Chopade/pfbid02U6foswJSgF5MHtzhr1kwxeTH2ryisU4zyx5pDAqHc1NKZLpWD4TNt9A222vgTqyKl/"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/pravin_180694/"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <div class="profile-card">
            <div class="img">
                <img src="Res/Team/Shubham.jpg">
            </div>
            <div class="caption">
                <h2>Shubham Patil</h2>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/shubham_patil_5665/?igshid=YmMyMTA2M2Y%3D"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <div class="profile-card">
            <div class="img">
                <img src="Res/chef-3.jpg">
            </div>
            <div class="caption">
                <h2>Tom Cruise</h2>
                <p>Full Stact Developer</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- Team ends -->


    <!-- Testimonial Starts -->
    <section id="testi">
      <div id="page" class="site">
		<div class="test-container">
			<div class="testi">
				<div class="head">
					<h1>Testimonial</h1>
					<h3>See what people are saying....</h3>
				</div>
				<div class="body swiper">
					<ul class="swiper-wrapper">
						<li class="swiper-slide">
							<div class="wrapper">
								<div class="thumbnail">
									<img src="Res/avatar.jpg" alt="">
								</div>
								<div class="aside">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
									<div class="name">
										<h4>Sarah Malik</h4>
										<p>Graphic Designer</p>
									</div>
								</div>
							</div>
						</li>
						<li class="swiper-slide">
							<div class="wrapper">
								<div class="thumbnail">
									<img src="Res/avatar-1.jpg" alt="">
								</div>
								<div class="aside">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. </p>
									<div class="name">
										<h4>Tara Shah</h4>
										<p>Graphic Designer</p>
									</div>
								</div>
							</div>
						</li>
						<li class="swiper-slide">
							<div class="wrapper">
								<div class="thumbnail">
									<img src="Res/avatar-2.jpg" alt="">
								</div>
								<div class="aside">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat.</p>
									<div class="name">
										<h4>Prakshi Sen</h4>
										<p>Web Developer</p>
									</div>
								</div>
							</div>
						</li>
						<li class="swiper-slide">
							<div class="wrapper">
								<div class="thumbnail">
									<img src="Res/avatar.jpg" alt="">
								</div>
								<div class="aside">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat.</p>
									<div class="name">
										<h4>Sneha Sharma</h4>
										<p>Entraprenuer</p>
									</div>
								</div>
							</div>
						</li>
						<li class="swiper-slide">
							<div class="wrapper">
								<div class="thumbnail">
									<img src="Res/avatar-1.jpg" alt="">
								</div>
								<div class="aside">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur.</p>
									<div class="name">
										<h4>John Roy</h4>
										<p>Software Engineer</p>
									</div>
								</div>
							</div>
						</li>
					</ul>
					<div class="swiper-pagination"></div>

					  <!-- If we need navigation buttons -->
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</div>
		</div>
	</div>
    </section>
    
    <!-- Testimonial Ends  -->






    <!-- Contact Us Starts -->

    <section id="contactus" class="contactus" style="background-image: url(Res/bg.png);">
        <h1>Get In Touch</h1>

      <div class="box">
        <div class="contact form">
          <h3>Send a Message</h3>
          <form action="#">
            <div class="contact-form">
              <div class="row50">
                <div class="inputBox">
                  <span>First Name</span>
                  <input type="text" placeholder="Shashank">
                </div>

                <div class="inputBox">
                  <span>Last Name</span>
                  <input type="text" placeholder="Joshi">
                </div>
              </div>

              <div class="row50">
                <div class="inputBox">
                  <span>Email</span>
                  <input type="email" placeholder="Shashankjoshi@gmail.com">
                </div>

                <div class="inputBox">
                  <span>Mobile</span>
                  <input type="number" placeholder="7418529630">
                </div>
              </div>

              <div class="row100">
                <div class="inputBox">
                  <span>Message</span>
                  <textarea placeholder="Write Your Message here...!!"></textarea>
                </div>
              </div>

              <div class="row100">
                <div class="inputBox">
                  <input type="submit" value="Send">
                </div>
              </div>
            </div>
          </form>
        </div>



        <div class="contact info">
          <h3>Contact Info</h3>
          <div class="contact-info">
            <div>
              <span><i class="fa-solid fa-location-dot"></i></span>
              <p>Shop no.1, Beside Mustafa Biryani, Cannought Cidco <br>AURANGABAD</p>
            </div>

            <div>
              <span><i class="fa-solid fa-envelope"></i></span>
              <a href="mailto:foodiemarvel@gmail.com">foodiemarvel@gmail.com</a>
            </div>

            <div>
              <span><i class="fa-solid fa-phone"></i> </span>
              <a href="tel:+917859651425">+91 90494 64634</a>
            </div>

            <ul class="sci">
              <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
            </ul>
          </div>
        </div>
        
        
        <div class="contact map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3752.1317787921175!2d75.36185501471103!3d19.
          876656686633567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdba3a8124167ad%3A0xc8c6279e957d2347!2sCafe%20foodiemarvel!
          5e0!3m2!1sen!2sin!4v1681032129524!5m2!1sen!2sin" 
          style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
      </div>
    </section>



    <!-- Contact Us Ends -->

    <!-- Footer Strats -->

    <footer class="footer-section">
        <div class="container">
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.php"><img src="Res/logobg.png" class="img-fluid" alt="logo"></a>
                            </div>
                            <div class="footer-social-icon">
                                <span>Follow us</span>
                                <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                                <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                                <a href="#"><i class="fab fa-instagram instagram-bg"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">about</a></li>
                                <li><a href="#">services</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">Expert Team</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Opening Hours :- </h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>Monday to Sunday</p>
                                <p>10:00am - 08:00pm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2023, All Right Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Ends -->
    <script src="js/script.js"></script>

    <script src="js/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
          <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
	<script>
		const swiper = new Swiper('.swiper', {
	          autoHeight: true,
			  loop: true,

			  // If we need pagination
			  pagination: {
			    el: '.swiper-pagination',
			  },

			  // Navigation arrows
			  navigation: {
			    nextEl: '.swiper-button-next',
			    prevEl: '.swiper-button-prev',
			  },

			 
			});
	</script>
  </body>
</html>