<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/signup.css">
</head>
<body style="background-image: url(Res/maxresdefault.jpg);">
  <div class="container">
  <div class="title">Registration</div>
  
  <form action="signup_DB.php" method="POST" enctype="multipart/form-data">

      <?php if(isset($_GET['error'])){ ?> 
        <p class="error"><?php echo $_GET['error']; ?> </p>
      <?php } ?>

      <?php if(isset($_GET['success'])){ ?> 
        <p class="success"><?php echo $_GET['success']; ?> </p>
      <?php } ?>


    <div class="user__details">
      <div class="input__box">
        <span class="details">Full Name</span>
        <input type="text" name="name" placeholder="Enter Full Name" required>
      </div>
      <div class="input__box">
        <span class="details">Username</span>
        <input type="text" name="username" placeholder="Enter Username" required>
      </div>
      <div class="input__box">
        <span class="details">Email</span>
        <input type="email" name="email" placeholder="Enter Email" required>
      </div>
      <div class="input__box">
        <span class="details">Phone Number</span>
        <input type="tel" name="phone" placeholder="Enter Mobile Number" required>
      </div>
      <div class="input__box">
        <span class="details">Password</span>
        <input type="password" name="password" placeholder="Enter Password" required>
      </div>
      <div class="input__box">
        <span class="details">Confirm Password</span>
        <input type="password" name="confirm_password" placeholder="Enter Confirm Password" required>
      </div>
      <div class="input__box">
        <span class="details"> Pofile Picture</span>
        <input type="file" name="user_img" class="form-control" required>
      </div>
    </div>
    <div class="button">
      <button type="submit" name ="register_btn"> Register </button>
    </div>
    <div class="text">
        <h3>Already Have an Account? <a href="login.php">Login</a></h3>
    </div>
  </form>
</div>
</body>
</html>