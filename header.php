
<?php
 //session_start();
 include 'connection.php';
 error_reporting(0);
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
<body>

<header>
    <nav class="nav nav-tabs nav-stacked bg-dark" style="color:white;">
         <span class="nav-link" ><?php echo"Welcome ".$userData['Name']; ?></span><br>
        <a class="nav-link active" href="home.php">Home</a>
        <a class="nav-link" href="profile.php?id=<?php echo $_SESSION['user']; ?>">View Profile</a>
        <a class="nav-link " href="user_list.php"> View Users</a>
        <a class="nav-link " href="logout.php"> Logout</a>
    </nav>
</header>

<script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>

















   

