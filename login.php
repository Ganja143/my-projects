<?php

session_start();
include 'connection.php';
include 'logincode.php';
error_reporting(0);

 if(isset($_SESSION['user']))
 {
    header("Location:home.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/font-awesome.min.css">
<title>Title</title>
</head>
<body style="background-image:url(./images/viewpic.jpg);background-position:contain;background-size:cover;">

  <div class="card  col-lg-4" style='margin-left:35%;margin-top:20vh;opacity:0.9;'>
    <div class="card-body" >
        <h5 class="card-title text-center card-title-primary" style="color:#007bff;">Sign In</h5>
        <p class="card-text justify-content-center" ><br>
           
            <form method="post"  enctype="multipart/form-data">
               <div class="form-group">
                  <input type="email" name="username" placeholder="Email" class="form-control"  required>
               </div>

                <br><div class="form-group">
                  <input type="password" name="password" class="form-control" pattern=""  placeholder="password" required>
                </div><br>
                Don't have an account?<a href="signup.php"> Sign-Up</a> <a href="signup.php" style="float:right;text-decoration:none;"> Forgot password</a><br>
               <br> <div class="form-group">
                   <input type="Submit" name="btn_submit"  value="Login" class="btn btn-primary form-control">
               </div><br>
              
             
            </form>
        </p>
    </div>
  </div>

<script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>
