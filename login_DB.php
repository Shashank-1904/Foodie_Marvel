<?php 
include('security.php');

if(isset($_POST['email']) && isset($_POST['password'])){
    function validate($data){
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data); 
      return $data; 
    }
    $u_email = validate($_POST['email']);
    $u_pass = validate($_POST['password']);

    if(empty($u_email)){
        header("location: login.php?error=Email is required");
        exit();
    }
    else if(empty($u_pass)){
        header("location: login.php?error=Password is required");
        exit();
    }
    else{
         //hashing the password

        $u_pass = md5($u_pass);
        $sql = "SELECT * FROM user_info WHERE email = '$u_email' AND password = '$u_pass'";

        $result = mysqli_query($conn , $sql);

        if(mysqli_num_rows($result) === 1){
           $row  = mysqli_fetch_assoc($result);
           if($row['email'] === $u_email){
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['id'] = $row['id'];

            header("location: index.php");
            exit();

           }else{
                header("location: login.php?error=Incorrect Username or Password");
                exit();
           }
        }else{
            header("location: login.php?error=Incorrect Username or Password");
            exit();
        }
    }
}
else{
    header("location: login.php");
    exit();
}
?>