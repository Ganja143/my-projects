<?php

//session_start();
include 'connection.php';

$mail=isset($_POST['username']) ? $_POST['username'] : "" ;
$pWord=isset($_POST['password']) ? $_POST['password'] : "" ;

if(isset($_POST['btn_submit']))
{
 

$pWord=hash('sha256',$pWord);
$result=$db->users->findOne(array('Email'=>$mail, 'Password'=>$pWord));

    if($result)
    {
        $_SESSION['user']=$result->_id;
        $_SESSION['username']=$result->Email;
        $_SESSION['password']=$result->Password;

        header('Location:home.php');
    }else{
        echo"Invalid username or password";
    }
}
?