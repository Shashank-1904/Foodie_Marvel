<?php 

session_start();
include "config.php";
 
if(isset($_POST['register_btn'])){
    function validate($data){
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data); 
      return $data; 
    }
    $u_name = validate($_POST['name']);
    $u_username = validate($_POST['username']);
    $u_email = validate($_POST['email']);
    $u_phone = $_POST['phone'];
    $u_pass = validate($_POST['password']);
    $u_img = $_FILES["user_img"]['name'];

    $uppercase = preg_match('@[A-Z]@', $u_pass);
    $lowercase = preg_match('@[a-z]@', $u_pass);
    $number    = preg_match('@[0-9]@', $u_pass);
    $specialChars = preg_match('@[^\w]@', $u_pass);

    $u_c_pass = validate($_POST['confirm_password']);


    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($u_pass) < 8) {
        header("location: signup.php?error= Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");
        exit();
    }
    else if($u_pass !== $u_c_pass){
        header("location: signup.php?error=Confirm Password Does not Matched");
        exit();
    }
    else
    {
        
        if(file_exists("User/user_images/".$_FILES["user_img"]["name"]))
        {
            header("location: signup.php?error=Image Already Exists");
        }
        else
        {
            //hashing the password
            $u_pass = md5($u_pass);
            $sql = "SELECT * FROM user_info WHERE email = '$u_email'";

            $result = mysqli_query($conn , $sql);

            if(mysqli_num_rows($result) > 0)
            {
                header("location: signup.php?error=Email Already Exist");
                exit();
            }
            else
            {   
                $sql2 = "INSERT INTO user_info (u_name,user_name,email,phone,password,user_image) Values ('$u_name','$u_username','$u_email','$u_phone','$u_pass','$u_img')";  
                $result2 = mysqli_query($conn , $sql2);

                if($result2)
                {
                        move_uploaded_file($_FILES["user_img"]["tmp_name"], "User/user_images/".$_FILES["user_img"]["name"]);
                        header("location: signup.php?success=Your Account has been Registered Successfully");
                        exit();
                }
                else
                {
                        header("location: signup.php?error=Something Went Wrong");
                        exit();
                }
            }
        }
    }
}
else{
    header("location: signup.php");
    exit();
}
?>