<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<title> Registration or Sign Up form in HTML CSS | CodingLab </title>-->
    <link rel="stylesheet" href="css/log.css">
   </head>
<body style="background-image: url(Res/maxresdefault.jpg)">
  <div class="wrapper" >
    <h2>Login</h2>
    <form action="login_DB.php" method="POST">
      <?php if(isset($_GET['error'])){ ?> 
        <p class="error"><?php echo $_GET['error']; ?> </p>
      <?php } ?>

      <div class="input-box">
        <input type="text" name= "email" placeholder="Enter Email">
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Enter Password">
      </div>
      <div class="input-box button">
        <input type="Submit" value="Sign In">
      </div>
      <div class="text">
        <h3>Don't Have an Account? <a href="signup.php">Register</a></h3>
      </div>
    </form>
  </div>
</body>
</html>
