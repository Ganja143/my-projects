<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location:login.php");
}
unset($_SESSION['user']);
session_unset();
session_destroy();

header("Location:login.php");
exit;



?>