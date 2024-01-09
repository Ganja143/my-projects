<?php
session_start();
require_once('connection.php');

if((!isset($_GET['id']))){
    exit;
}

$user_id=$_GET['id'];
$follower_id=$_SESSION['user'];
// inserting different user id's into the database using the mongodb bson object id method;
$db->following->insertOne( array(

    'user'=> new MongoDB\BSON\ObjectID("$user_id"),
    'follower'=> new MongoDB\BSON\ObjectID("$follower_id")

));

header("Location:user_list.php");

?>