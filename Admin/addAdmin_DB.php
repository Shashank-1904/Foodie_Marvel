<?php 
include('security.php');


if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])){
    function validate($data){
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data); 
      return $data; 
    }
    $a_name = validate($_POST['username']);
    $a_email = validate($_POST['email']);
    $a_pass = validate($_POST['password']);

    $uppercase = preg_match('@[A-Z]@', $a_pass);
    $lowercase = preg_match('@[a-z]@', $a_pass);
    $number    = preg_match('@[0-9]@', $a_pass);
    $specialChars = preg_match('@[^\w]@', $a_pass);

    $a_c_pass = validate($_POST['confirm_password']);

    if(empty($a_name)){
        header("location: addAdmin.php?error=Username is required");
        exit();
    }

    else if(empty($a_email)){
      header("location: addAdmin.php?error=Email is required");
      exit();
    }

    else if(empty($a_pass)){
        header("location: addAdmin.php?error=Password is required");
        exit();
    }
    else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($a_pass) < 8) {
        header("location: addAdmin.php?error= Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");
        exit();
    }
    else if(empty($a_c_pass)){
        header("location: addAdmin.php?error=Confirm Password is required");
        exit();
    }
    else if($a_pass !== $a_c_pass){
        header("location: addAdmin.php?error=Confirm Password Does not Matched");
        exit();
    }
    else{

        //hashing the password
        $a_pass = md5($a_pass);
        $sql = "SELECT * FROM admin_info WHERE email = '$a_email'";

        $result = mysqli_query($conn , $sql);

        if(mysqli_num_rows($result) > 0){
            header("location: addAdmin.php?error=Email Already Exist");
            exit();
        }
        else{   
          $sql2 = "INSERT INTO admin_info (admin_name,email,password) Values ('$a_name','$a_email','$a_pass')";  
          $result2 = mysqli_query($conn , $sql2);

            if($result2){
                header("location: addAdmin.php?success=Your Account has been Registered Successfully");
                exit();
            }else{
                header("location: addAdmin.php?error=Something Went Wrong");
                exit();
            }
        }
    }
}
else{
    header("location: addAdmin.php");
    exit();
}

?>