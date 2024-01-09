<?php
include 'connection.php';
$data=$db->users->find();
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
<link rel="stylesheet" href="./fonts">
<title>Title</title>
</head>
<body style="background-image:url(./images/viewpic.jpg);background-position:contain;background-size:cover;">

  <div class="card col-lg-6 " style='margin-left:25%;margin-top:15vh;opacity:0.9;'>
    <div class="card-body" >
        <h5 class="card-title text-center card-title-primary" style="color:#007bff;">Sign Up</h5>
        <p class="card-text justify-content-center" ><br>
           
        <form method="post"  enctype="multipart/form-data">

                <div class="form-group">
                   <input type="text" name="txt_name"  class="form-control" placeholder="First name" value="<?php $name=isset($_POST['txt_name']) ? $_POST['txt_name'] : "" ?>" required>
                </div>
                <div class="form-group">
                   <input type="text" name="txt_surname"  class="form-control" placeholder="Last name" value="<?php $surname=isset($_POST['txt_surname']) ? $_POST['txt_surname'] : "" ?>" required>
                </div>
                <div class="form-group">
                   <input type="file" name="img_propic" id="" accept="image/*" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="email" name="username"  class="form-control" placeholder="Email" value="<?php $mail=isset($_POST['username']) ? $_POST['username'] : "" ?>"  required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  class="form-control" placeholder="password" value="<?php $pWord=isset($_POST['password']) ? $_POST['password'] : "" ?>" required>
                </div><br><br>
                <div class="form-group">
                <input type="Submit" name="btn_submit"  value="Login" class="btn btn-primary form-control w-80">
                </div>

        </form>

        </p>
    </div>
  </div><br><br>
  <?php

//DECLARE AN EMPTY TO PUT THE USER INPUT INFO ON IT AND SEND TO DATABASE TABLE

$user_info=array();

if(isset($_POST['btn_submit'])){

    $propic = $_FILES["img_propic"]["name"];
	$tempname = $_FILES["img_propic"]["tmp_name"];
	$folder = "./propics/" . $propic;
    

 //POPULATE ARRAY WITH DATA YOU WANT IN THE TABLE AND ALSO COLLECT INPUT FROM FORM TO MATCH IT
    $pWord=hash('sha256',$pWord);
    $user_info['Name']=$name;
    $user_info['Surname']=$surname;
    $user_info['Profile pic']=$propic;
    $user_info['Email']=$mail;
    $user_info['Password']=$pWord;


    
   $result=$db->users->insertOne($user_info);
   move_uploaded_file($tempname, $folder);

    $db->users=array();
    $_POST=array();
 

    if($result)
     {
      header("Location:login.php");
     }

}

foreach($data as $view)
{
    echo'<table border="1" style="background-color:white;color:black;">';
    echo "<tr><td>".$view['Email']."</td>";
    echo "<td>".$view['Password']."</td></tr> </table>";
    
}


?>

<script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>