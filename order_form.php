
<?php
include('security.php');
$u_id = $_SESSION['id'];

if(!isset($_SESSION['user_name']))
{
  header("location:login.php");
  exit();
}
else
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap');

*{
  font-family: 'Poppins', sans-serif;
  margin:0; padding:0;
  box-sizing: border-box;
  outline: none; border:none;
  text-transform: capitalize;
  transition: all .2s linear;
}

.container{
  display: flex;
  justify-content: center;
  align-items: center;
  padding:25px;
  min-height: 100vh;
  background-image:url(Res/bg.png);
}

.container form{
  padding:20px;
  width:700px;
  background: #fff;
  box-shadow: 0 5px 10px rgba(0,0,0,.1);
}

.container form .row{
  display: flex;
  flex-wrap: wrap;
  gap:15px;
}

.container form .row .col{
  flex:1 1 250px;
}

.container form .row .col .title{
  font-size: 20px;
  color:#333;
  padding-bottom: 5px;
  text-transform: uppercase;
}

.container form .row .col .inputBox{
  margin:15px 0;
}

.container form .row .col .inputBox span{
  margin-bottom: 10px;
  display: block;
}

.container form .row .col .inputBox input{
  width: 100%;
  border:1px solid #ccc;
  padding:10px 15px;
  font-size: 15px;
  text-transform: none;
}

.container form .row .col .inputBox input:focus{
  border:1px solid #000;
}

.container form .row .col .flex{
  display: flex;
  gap:15px;
}

.container form .row .col .flex .inputBox{
  margin-top: 5px;
}

.container form .row .col .inputBox img{
  height: 34px;
  margin-top: 5px;
  filter: drop-shadow(0 0 1px #000);
}

.container form .submit-btn{
  width: 100%;
  padding:12px;
  font-size: 17px;
  background: #000;
  color:#fff;
  margin-top: 5px;
  cursor: pointer;
}

.container form .submit-btn:hover{
  background: #dd3636;
}

/* for radio */
[type="radio"]:checked,
[type="radio"]:not(:checked) {
    position: absolute;
    left: -9999px;
}
[type="radio"]:checked + label,
[type="radio"]:not(:checked) + label
{
    position: relative;
    padding-left: 28px;
    cursor: pointer;
    line-height: 20px;
    display: inline-block;
    color: #000;
}
[type="radio"]:checked + label:before,
[type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 18px;
    height: 18px;
    border: 1px solid #ddd;
    border-radius: 100%;
    background: #fff;
}
[type="radio"]:checked + label:after,
[type="radio"]:not(:checked) + label:after {
    content: '';
    width: 12px;
    height: 12px;
    background: #dd3636;
    position: absolute;
    top: 4px;
    left: 4px;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
[type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
}
[type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
}
    </style>

</head>
<body>
<div class="container">
    <?php
    $query = "SELECT * FROM user_info WHERE id='$u_id'";
    $query_run = mysqli_query($conn,$query);

    if(mysqli_num_rows($query_run) > 0)
    {
      $row = mysqli_fetch_assoc($query_run);
    }

    ?>

    <form action="order_DB.php" method="POST">
      <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
        <div class="row">

            <div class="col">

                <h3 class="title">Personal Info.</h3>

                <div class="inputBox">
                    <span>Username</span>
                    <input type="text" value="<?php echo $row['user_name'];?>" name="username" readonly>
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" value="<?php echo $row['email'];?>" name="email" readonly>
                </div>
                 <div class="inputBox">
                    <span>phone</span>
                    <input type="text" value="<?php echo $row['phone'];?>" name="phone" placeholder="">
                </div>
                
            </div>

            <div class="col">
              <h3 class="title">Address Info.</h3>
                <div class="inputBox">
                    <span>Street</span>
                    <input type="text" name="street" placeholder="street and House No" required>
                </div>
                <div class="inputBox">
                    <span>Landmark</span>
                    <input type="text" name="landmark" placeholder="Landmark" required>
                </div>
            </div>   
        </div>

        <h3 class="title">Payment Info :-</h3>

          <h4 style="margin-top:1rem;"> Bill Amount :- Rs. <?php echo $_SESSION['grand_total'];?> /-</h4>
          <div class="pay_method" style="margin-top:1rem;">
            <p>
              <input type="radio" value="Cash On Delivery" id="test1" name="radio-group" checked>
              <label for="test1">Cash On Delivery</label>
            </p>
            <!-- <p style="margin-top:0.5rem;">
              <input type="radio" id="test2" name="radio-group">
              <label for="test2">UPI</label>
            </p> -->
          </div>
            
        <input type="submit" name="checkout" value="proceed to checkout" class="submit-btn">

    </form>

</div>    
    
</body>
</html>
<?php
}
?>