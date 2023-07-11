<link href="css/sb-admin-2.min.css" rel="stylesheet">

<?php

$sname = "localhost";
$db_usname = "root";
$db_password = "";

$db_name = "foodie_marvel";

$conn = mysqli_connect($sname, $db_usname , $db_password);
$dbconfig = mysqli_select_db($conn,$db_name);

if($dbconfig)
{
    // echo "Coonection passed";
}
else
{
    echo '
        <div class="container">
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center py-5 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title bg-danger text-white"> Database Connection Failed</h1>
                            <h2 class="card-title"> Database Error </h2>
                            <p class="card-text"> Please Check Your Database Connection </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        ';
}


?>

